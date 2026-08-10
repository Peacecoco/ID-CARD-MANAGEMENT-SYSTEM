<?php
// ============================================================
// templates/front/shared_front.php
//
// ONE front template for every college. Layout is identical
// across colleges, only the theme color differs (yellow, blue,
// green, etc, driven by colleges.primary_color). A new college
// is a data row, not a new file.
//
// Expects in scope: $student (array), $college (array), $photoPath (string)
// ============================================================
?>
<div class="card-front">
    <?php include TEMPLATES_PATH . '/partials/header_logo.php'; ?>
    <?php 
        $middlePhotoPath = $photoPath;
        include TEMPLATES_PATH . '/partials/middle.php'; ?>


    <?php include TEMPLATES_PATH . '/partials/footer2.php'; ?>

</div>
<style>
    .card-front {
        width: <?= CARD_WIDTH_MM ?>mm;
        height: <?= CARD_HEIGHT_MM ?>mm;
        position: relative;
        font-family: Arial, sans-serif;
        box-sizing: border-box;
    }
    .photo-block {
        text-align: center;
        margin-top: 3mm;
    }
    .passport-photo {
        width: 22mm;
        height: 26mm;
        object-fit: cover;
        border: 0.3mm solid #cccccc;
    }
    .details {
        padding: 3mm;
        font-size: 8pt;
        color: #111111;
    }
    .details .name {
        font-weight: bold;
        font-size: 9pt;
        margin-bottom: 1mm;
    }
    .details > div {
        margin-bottom: 0.8mm;
    }

</style>
