<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/lib/Database.php';
require __DIR__ . '/lib/Renderer.php';

$collegeId = filter_input(INPUT_GET, 'college_id', FILTER_VALIDATE_INT);

if (!$collegeId) {
    http_response_code(400);
    exit('Use preview.php?college_id=1');
}

try {
    $preview = (new Renderer(new Database()))->previewCollege($collegeId);
} catch (Throwable $e) {
    http_response_code(500);
    exit(htmlspecialchars($e->getMessage()));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card Preview - <?= htmlspecialchars($preview['college']['name']) ?></title>
    <style>
        body { margin: 0; padding: 24px; background: #e9ecef; font-family: Arial, sans-serif; }
        .toolbar { margin: 0 auto 24px; max-width: 900px; }
        .cards { display: flex; flex-wrap: wrap; gap: 32px; justify-content: center; }
        .card-preview { width: <?= CARD_WIDTH_MM ?>mm; display: flex; flex-direction: column; gap: 8px; }
        .side-label { font-size: 12px; font-weight: bold; text-transform: uppercase; color: #495057; overflow-wrap: anywhere; }
        .card {
            width: <?= CARD_WIDTH_MM ?>mm;
            height: <?= CARD_HEIGHT_MM ?>mm;
            overflow: hidden;
            background: white;
            box-shadow: 0 2px 12px #0003;
        }
        .card .card-front, .card .card-back { width: 100%; height: 100%; }
        @media (max-width: 600px) { body { padding: 12px; } }
    </style>
</head>
<body>
    <div class="toolbar">
        <strong><?= htmlspecialchars($preview['college']['name']) ?></strong>
        <span><?= count($preview['cards']) ?> card(s) previewed</span>
    </div>
    <div class="cards">
        <?php foreach ($preview['cards'] as $card): ?>
            <section class="card-preview">
                <div class="side-label"><?= htmlspecialchars($card['student']['full_name']) ?> - Front</div>
                <div class="card"><?= $card['front'] ?></div>
                <div class="side-label">Back</div>
                <div class="card"><?= $card['back'] ?></div>
            </section>
        <?php endforeach; ?>
    </div>
</body>
</html>
