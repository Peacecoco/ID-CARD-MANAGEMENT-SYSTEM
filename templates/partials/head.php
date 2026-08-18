<?php
// ============================================================
// templates/partials/header_logo.php
//
// Shared header block: crest + university name.
// Expects in scope: $college (array)
// ============================================================

$primaryColor = $college['primary_color'] ?? '#20439C';
?>

<table
    class="card-header-table"
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
>
    <tr>
        <!-- UNIVERSITY CREST -->
        <td
            class="crest-cell"
            width="27%"
            valign="middle"
        >
            <?php if (!empty($college['logo'])): ?>
                <img
                    src="<?= htmlspecialchars($college['logo']) ?>"
                    class="crest-img"
                    alt="University Logo"
                >
            <?php endif; ?>
        </td>

        <!-- UNIVERSITY NAME -->
        <td
            class="university-name-cell"
            width="73%"
            valign="middle"
        >
            <?= htmlspecialchars($college['name'] ?? 'University') ?>
        </td>
    </tr>
</table>

<style>
/* ============================================================
   HEADER
   ============================================================ */

.card-header-table {
    width: 100%;
    height: <?= HEADER_HEIGHT_MM ?>mm;
    border-collapse: collapse;
    border-spacing: 0;
    margin: 0;
    padding: 0;
    background-color: <?= htmlspecialchars($primaryColor) ?>;
}

.card-header-table tr {
    height: <?= HEADER_HEIGHT_MM ?>mm;
    margin: 0;
    padding: 0;
}

.crest-cell {
    height: <?= HEADER_HEIGHT_MM ?>mm;
    padding: 1.5mm 1mm 1.5mm 2mm;
    margin: 0;
    text-align: center;
    vertical-align: middle;
}

.crest-img {
    display: block;
    max-width: 22mm;
    max-height: 17mm;
    width: auto;
    height: auto;
    margin: 0 auto;
}

.university-name-cell {
    height: <?= HEADER_HEIGHT_MM ?>mm;
    padding: 0 2mm 0 0;
    margin: 0;
    color: #ffffff;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 8mm;
    font-weight: bold;
    line-height: 1.15;
    text-align: left;
    vertical-align: middle;
}
</style>