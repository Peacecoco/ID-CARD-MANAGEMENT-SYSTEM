<?php
// ============================================================
// templates/partials/footer.php
//
// Shared footer for ALL colleges. Color and text come from the
// colleges table (primary_color, footer_text) so a new college
// never requires a new footer file, only a new data row.
//
// Expects in scope: $college (array)
// ============================================================
$footerText = $college['footer_text'] ?? $college['name'];
?>
<div class="card-footer" style="background-color: <?= htmlspecialchars($college['primary_color']) ?>;">
    <div class="footer-text"><?= htmlspecialchars($footerText) ?></div>
</div>
<style>
    .card-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 1.5mm 2mm;
        text-align: center;
        box-sizing: border-box;
    }
    .card-footer .footer-text {
        font-size: 6.5pt;
        color: #ffffff;
    }
</style>
