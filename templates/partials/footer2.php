<?php
$footerImage = __DIR__ . '/../../assets/images/image.png';
$collegeImagePath = __DIR__ . '/../../' . ltrim($college['logo_path'], '/');
$primaryColor = $college['primary_color'] ?? '#ffffff';
// Prefer a small logo; fall back to bundled university-logo.png
$smallLogo = file_exists($collegeImagePath) ? $collegeImagePath : __DIR__ . '/../../assets/images/university-logo.png';
?>

<div class="footer-wrapper" style="background-color: <?= htmlspecialchars($primaryColor) ?>;">
    <img src="<?= htmlspecialchars($smallLogo) ?>" class="footer-logo" alt="Logo">
    <table class="footer-table" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr class="footer-row">
            <td class="footer-year">
                <svg class="vertical-svg" width="120" height="120" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <text x="60" y="60" text-anchor="middle" dominant-baseline="middle" transform="rotate(-90 60 60)" style="font-family: Arial, sans-serif; font-size:18pt; font-weight:bold; fill:#000000;"><?= htmlspecialchars(
                        $student['validity_start'] . '-' . $student['validity_end']
                    ) ?></text>
                </svg>
            </td>

            <td class="footer-photo-cell">
                <img
                    src="<?= htmlspecialchars($photoPath) ?>"
                    class="footer-student-photo"
                    alt="Student Photo">
            </td>

            <td class="footer-student-label">
                <svg class="vertical-svg" width="120" height="120" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <text x="60" y="60" text-anchor="middle" dominant-baseline="middle" transform="rotate(-90 60 60)" style="font-family: Arial, sans-serif; font-size:18pt; font-weight:bold; fill:#000000;">STUDENT</text>
                </svg>
            </td>
        </tr>
    </table>
</div>

<style>
    .footer-wrapper {
        position: relative;
        width: 100%;
        height: <?= FOOTER_HEIGHT_MM ?>mm;
        overflow: hidden;
        margin: 0;
        padding: 0;
        /* footer background is a CSS fill + small logo to avoid full-card rasters */
        background-repeat: no-repeat;
        background-size: auto;
        background-position: center;
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }

    .footer-table {
        width: 100%;
        height: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        table-layout: fixed;
        margin: 0;
        padding: 0;
        line-height: 0;
    }

    .footer-row {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .footer-year,
    .footer-photo-cell,
    .footer-student-label {
        height: 100%;
        padding: 0;
        margin: 0;
        vertical-align: middle;
        text-align: center;
        overflow: hidden;
    }

    .footer-year,
    .footer-student-label {
        width: 12mm;
    }

    .footer-photo-cell {
        width: 26mm;
    }

    .vertical-svg {
        width: 100%;
        height: 100%;
        display: block;
        margin: 0;
        padding: 0;
    }

    .footer-student-photo {
    display: block;
    width: 100%;
    height: 85%;
    object-fit: cover;
    margin: 7.5% auto;
    padding: 0;
}

    .footer-logo {
        position: absolute;
        right: 2mm;
        top: 50%;
        transform: translateY(-50%);
        width: 10mm;
        height: auto;
        display: block;
    }
</style>