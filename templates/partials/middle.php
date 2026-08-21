<?php
$buildingImage = __DIR__ . '/../../assets/images/cu_building.jpg';
?>
<div class="container">

    <table class="middle-table" cellpadding="0" cellspacing="0">
        <colgroup>
            <col class="building-column" width="50%">
            <col class="details-column" width="50%">
        </colgroup>
        <tr>

            <!-- LEFT: BUILDING IMAGE -->
            <td class="building-cell"></td>

            <!-- RIGHT: STUDENT DETAILS -->
            <td class="details">

                <table class="details-table" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="item">
                            <?= strtoupper(htmlspecialchars($student['full_name'])) ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="space">&nbsp;</td>
                    </tr>

                    <tr>
                        <td class="item">
                            <?= htmlspecialchars($college['code']) ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="space">&nbsp;</td>
                    </tr>

                    <tr>
                        <td class="item">
                            <?= htmlspecialchars($student['department']) ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="space">&nbsp;</td>
                    </tr>

                    <tr>
                        <td class="item">
                            <?= htmlspecialchars($student['matric_no']) ?>
                        </td>
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
        margin: 0;
        padding: 0;
        overflow: hidden;
        box-sizing: border-box;
        background-color: <?= htmlspecialchars($college['primary_color'] ?? '#ff0000') ?>;
    }

    /* MAIN TABLE */
    .middle-table {
        width: 100%;
        height: <?= MIDDLE_HEIGHT_MM ?>mm;
        margin: 0;
        padding: 0;
        border: 0;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .building-column,
    .details-column {
        width: 50%;
    }

    /* LEFT SIDE */
    .building-cell {
        width: 50%;
        height: <?= MIDDLE_HEIGHT_MM ?>mm;
        padding: 0;
        margin: 0;
        vertical-align: top;
        background-image: url('<?= htmlspecialchars($buildingImage) ?>');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100% 100%;
    }

    /* RIGHT SIDE */
    .details {
        width: 50%;
        height: <?= MIDDLE_HEIGHT_MM ?>mm;
        padding: 0;
        margin: 0;
        vertical-align: middle;
        overflow: hidden;
    }

    /* DETAILS TABLE */
    .details-table {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        border: 0;
        border-collapse: collapse;
        table-layout: fixed;
    }

    /* TEXT */
    .item {
        height: 6mm;
        width: 100%;
        padding: 0 2mm;
        text-align: center;
        vertical-align: middle;
        font-size: 10pt;
        line-height: 4mm;
        font-weight: bold;
        word-wrap: break-word;
        word-break: break-all;
    }

    /* SPACING */
    .space {
        height: 2mm;
        padding: 0;
        margin: 0;
        font-size: 1px;
        line-height: 1px;
    }
</style>
