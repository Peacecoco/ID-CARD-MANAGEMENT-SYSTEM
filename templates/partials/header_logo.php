<?php
// ============================================================
// templates/partials/header_logo.php
//
// Shared header block: crest + university name, themed with
// the college's primary_color. Included by every front template
// so a university-wide branding change only needs editing here.
//
// Expects in scope: $college (array)
// ============================================================
?>
<div class="card-header">

    <table class="header-table">
        <tr>
            <td class="logo-cell">
                <img
                    src="<?= htmlspecialchars(__DIR__ . '/../../assets/images/university-logo.png') ?>"
                    class="crest"
                    alt="University Logo"
                >
            </td>

            <td class="name-cell">
                <div class="uni-name">
                    Covenant<br>University
                </div>
            </td>
        </tr>
    </table>

</div>
<style>

.card-header {
    width: 100%;
    background-color: <?= htmlspecialchars($college['primary_color']) ?>;
    color: #ffffff;
    padding: 3mm;
    box-sizing: border-box;
}

.header-table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

.logo-cell {
    width: 15mm;
    vertical-align: middle;
    padding: 0;
}

.name-cell {
    vertical-align: middle;
    padding: 0;
}

.card-header .crest {
    width: 12mm;
    height: 12mm;
    object-fit: contain;
}

.card-header .uni-name {
    font-family: Arial, sans-serif;
    font-size: 16pt;
    font-weight: bold;
    line-height: 1.05;
    margin: 0;
    color: #ffffff;
}

</style>
