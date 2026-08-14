<?php 
?>

<div class="container">

    <table>
        <tr>
            <td>
                <img
                    src="<?= htmlspecialchars(__DIR__ . '/../../assets/images/cu_building.jpg') ?>"
                    width="100%"
                    class="building-img">
            </td>
            <td class="details">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr><td class="item"><?= htmlspecialchars($student['full_name']) ?></td></tr>
                    <tr><td style="height: 8mm; font-size: 1px; line-height: 3mm;">&nbsp;</td></tr>
                    <tr><td class="item"><?= htmlspecialchars($student['department']) ?></td></tr>
                    <tr><td style="height: 8mm; font-size: 1px; line-height: 3mm;">&nbsp;</td></tr>
                    <tr><td class="item"><?= htmlspecialchars($student['matric_no']) ?></td></tr>
                </table>
            </td>
        </tr>

    </table>
    

</div>

<style>
    .container {
        width: 100%;
        height: 50mm;
        box-sizing: border-box;
        flex-shrink: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        line-height: 0;
    }

    td {
        vertical-align: middle;
        padding: 0;
    }
    .details {
        background-color: red;
    }
    .details .item {
        padding: auto 5px;
    }

    .details .item:last-child {
        padding-bottom: 0;
    }
</style>