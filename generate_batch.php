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

$collegeId = isset($argv[1]) ? (int) $argv[1] : null;

if (!$collegeId) {
    fwrite(STDERR, "Usage: php generate_batch.php <college_id>\n");
    exit(1);
}

try {
    $db = new Database();

    // Step 1: pre-process photos for this college (skips already-processed ones)
    $students = $db->getStudentsByCollege($collegeId);
    [$processedCount, $photoFailures] = PhotoProcessor::processCollegeBatch($db, $students);

    echo "Photos processed: {$processedCount}\n";
    if (!empty($photoFailures)) {
        echo "Photo failures:\n";
        foreach ($photoFailures as $f) {
            echo "  - {$f['matric_no']}: {$f['error']}\n";
        }
    }

    // Step 2: render the batch PDF
    $renderer = new Renderer($db);
    $result = $renderer->generateCollegeBatch($collegeId, generatedBy: 'cli');

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
} catch (Throwable $e) {
    fwrite(STDERR, "Fatal error: {$e->getMessage()}\n");
    exit(1);
}
