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
    <div class="card-inner">
        <?php include TEMPLATES_PATH . '/partials/header_logo.php'; ?>

        <div class="content-area">
            <?php $middlePhotoPath = $photoPath; include TEMPLATES_PATH . '/partials/middle.php'; ?>
        </div>
        <div class="footer-wrap">
            <?php include TEMPLATES_PATH . '/partials/footer2.php'; ?>
        </div>
    </div>

</div>
<style>
    .card-front {
        width: <?= CARD_WIDTH_MM ?>mm;
        height: <?= CARD_HEIGHT_MM ?>mm;
        box-sizing: border-box;
        overflow: hidden;
        background: #fff;
        margin: 0;
        padding: 0;
    }

    .card-inner {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    .content-area {
        flex: 0 0 auto;
        margin: 0;
        padding: 0;
    }

    .footer-wrap {
        flex: 1;
        width: 100%;
        margin: 0;
        padding: 0;
    }
</style>
