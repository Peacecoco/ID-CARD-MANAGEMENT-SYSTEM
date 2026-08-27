<?php
// ============================================================
// generate_batch.php
//
// Entry point. Run from CLI:
//   php generate_batch.php <college_id>
//
// Or adapt the bottom section for a web-triggered version
// (e.g. called from an admin panel button).
// ============================================================

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/lib/Database.php';
require __DIR__ . '/lib/PhotoProcessor.php';
require __DIR__ . '/lib/Renderer.php';

$isCli = PHP_SAPI === 'cli';
$collegeId = $isCli
    ? (isset($argv[1]) ? (int) $argv[1] : null)
    : (isset($_GET['college_id']) ? (int) $_GET['college_id'] : null);
$inline = !$isCli && isset($_GET['inline']) && $_GET['inline'] === '1';

if (!$collegeId) {
    $message = $isCli
        ? "Usage: php generate_batch.php <college_id>\n"
        : 'Missing or invalid college_id.';

    if ($isCli) {
        fwrite(STDERR, $message);
    } else {
        http_response_code(400);
        echo $message;
    }
    exit(1);
}

try {
    $db = new Database();

    // Step 1: pre-process photos for this college (skips already-processed ones)
    $students = $db->getStudentsByCollege($collegeId);
    [$processedCount, $photoFailures] = PhotoProcessor::processCollegeBatch($db, $students);

    if ($isCli) {
        echo "Photos processed: {$processedCount}\n";
        if (!empty($photoFailures)) {
            echo "Photo failures:\n";
            foreach ($photoFailures as $f) {
                echo "  - {$f['matric_no']}: {$f['error']}\n";
            }
        }
    }

    // Step 2: render the batch PDF
    $renderer = new Renderer($db);
    $result = $renderer->generateCollegeBatch($collegeId, generatedBy: $isCli ? 'cli' : 'web');

    if ($isCli) {
        echo "\nBatch complete.\n";
        echo "Batch ID: {$result['batch_id']}\n";
        echo "PDF: {$result['pdf_path']}\n";
        echo "Cards generated: {$result['success_count']}\n";

        if (!empty($result['failures'])) {
            echo "Card generation failures:\n";
            foreach ($result['failures'] as $f) {
                echo "  - {$f['matric_no']}: {$f['error']}\n";
            }
        }

        exit(0);
    }

    if (!is_file($result['pdf_path']) || !is_readable($result['pdf_path'])) {
        throw new RuntimeException('The batch was generated but its PDF file could not be read.');
    }

    $downloadName = basename($result['pdf_path']);
    header('Content-Type: application/pdf');
    header('Content-Disposition: ' . ($inline ? 'inline' : 'attachment') . '; filename="' . addcslashes($downloadName, "\\\"") . '"');
    header('Content-Length: ' . filesize($result['pdf_path']));
    header('Cache-Control: private, no-store');
    readfile($result['pdf_path']);
    exit(0);
} catch (Throwable $e) {
    $message = "Fatal error: {$e->getMessage()}\n";

    if ($isCli) {
        fwrite(STDERR, $message);
    } else {
        http_response_code(500);
        echo nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
    }
    exit(1);
}
