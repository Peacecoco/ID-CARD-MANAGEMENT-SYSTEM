<?php
// ============================================================
// templates/front/shared_front.php
//
// Shared front-side ID card layout.
//
// Structure:
//
//     HEADER
//     --------
//     MIDDLE
//     --------
//     FOOTER
//
// The three sections use fixed heights so mPDF does not create
// unwanted leftover space between them.
// ============================================================
?>

<div class="card-front">

    <div class="card-inner">

        <!-- ==================================================
             HEADER
             ================================================== -->
        <div class="card-header-wrap">
            <?php include TEMPLATES_PATH . '/partials/head.php'; ?>
        </div>


        <!-- ==================================================
             MIDDLE
             ================================================== -->
        <div class="card-middle-wrap">

            <?php
            $middlePhotoPath = $photoPath;

            include TEMPLATES_PATH . '/partials/mid.php';
            ?>

        </div>


        <!-- ==================================================
             FOOTER
             ================================================== -->
        <div class="card-footer-wrap">

            <?php
            include TEMPLATES_PATH . '/partials/footer2.php';
            ?>

        </div>

    </div>

</div>


<style>

/* ============================================================
   COMPLETE CARD
   ============================================================ */

.card-front {
    width: <?= CARD_WIDTH_MM ?>mm;
    height: <?= CARD_HEIGHT_MM ?>mm;

    margin: 0;
    padding: 0;

    overflow: hidden;

    box-sizing: border-box;
}


/* ============================================================
   CARD INNER
   ============================================================ */

.card-inner {
    width: 100%;
    height: <?= CARD_HEIGHT_MM ?>mm;

    margin: 0;
    padding: 0;

    box-sizing: border-box;
}


/* ============================================================
   HEADER
   ============================================================ */

.card-header-wrap {
    width: 100%;
    height: <?= HEADER_HEIGHT_MM ?>mm;

    margin: 0;
    padding: 0;

    overflow: hidden;

    box-sizing: border-box;
}


/* ============================================================
   MIDDLE
   ============================================================ */

.card-middle-wrap {
    width: 100%;
    height: <?= MIDDLE_HEIGHT_MM ?>mm;

    margin: 0;
    padding: 0;

    overflow: hidden;

    box-sizing: border-box;
}


/* ============================================================
   FOOTER
   ============================================================ */

.card-footer-wrap {
    width: 100%;

    /*
     * Whatever space remains after the header and middle
     * becomes the footer.
     */
    height: calc(
        <?= CARD_HEIGHT_MM ?>mm
        - <?= HEADER_HEIGHT_MM ?>mm
        - <?= MIDDLE_HEIGHT_MM ?>mm
    );

    margin: 0;
    padding: 0;

    overflow: hidden;

    box-sizing: border-box;
}


/* ============================================================
   REMOVE DEFAULT SPACING
   ============================================================ */

.card-front table,
.card-front tr,
.card-front td {
    margin: 0;
}

.card-front table {
    border-spacing: 0;
}

</style>