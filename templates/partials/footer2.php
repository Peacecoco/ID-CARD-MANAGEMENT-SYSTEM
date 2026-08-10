<?php
$footerImage = __DIR__ . '/../../assets/images/image.png';
?>

<table class="footer-table" width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td
            class="footer-cell"
            style="background-image: url('<?= htmlspecialchars($footerImage) ?>');"
        >

            <img
                src="<?= htmlspecialchars($photoPath) ?>"
                class="footer-student-photo"
                alt="Student Photo"
            >

        </td>
    </tr>
</table>

<style>
    .footer-table {
        width: 100%;
        height: 55mm;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .footer-cell {
        width: 100%;
        height: 55mm;
        padding: 0;
        text-align: center;
        vertical-align: middle;

        background-repeat: no-repeat;
        background-position: center;
        background-size: 100% 100%;
    }

    .footer-student-photo {
        width: 30mm;
        height: 35mm;
        display: inline-block;
    }
</style>