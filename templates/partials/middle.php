<?php
?>
<div class="container">

    <table>
        <tr>
            <td class="building-cell"></td>
            <td class="details">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="item"><?= htmlspecialchars($student['full_name']) ?></td>
                    </tr>
                    <tr>
                        <td style="height: 8mm; font-size: 1px; line-height: 3mm;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="item"><?= htmlspecialchars($student['department']) ?></td>
                    </tr>
                    <tr>
                        <td style="height: 8mm; font-size: 1px; line-height: 3mm;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="item"><?= htmlspecialchars($student['matric_no']) ?></td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>


</div>

<style>
    .container {
        width: 100%;
        height: <?= MIDDLE_HEIGHT_MM ?>mm;
        box-sizing: border-box;
        flex-shrink: 0;
        margin: 0;
        padding: 0;
    }

    .building-cell {
    width: 50%;              
    height: <?= MIDDLE_HEIGHT_MM ?>mm;
    background-image: url('<?= htmlspecialchars(__DIR__ . '/../../assets/images/cu_building.jpg') ?>');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        line-height: 0;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    tr{
        height: 100%;
    }

    td {
        vertical-align: middle;
        padding: 0;
        margin: 0;
    }

    .details {
        background-color: <?= htmlspecialchars(
    $college['primary_color'] ?? '#ff0000'
) ?>;
        width: 50%;
    }

    .details .item {
        padding: 0 5px;
        margin: 0;
    }

    .details .item:last-child {
        padding-bottom: 0;
    }
</style>