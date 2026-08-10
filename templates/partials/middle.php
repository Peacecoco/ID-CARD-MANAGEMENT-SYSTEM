<?php

?>



<table class="building-table" width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td class="building-cell" width="50%">
            <img
                src="<?= htmlspecialchars(__DIR__ . '/../../assets/images/cu_building.jpg') ?>"
                width="100%"
                class="building-img"
            >
        </td>

        <td class="red-cell" width="100%">
             <div class="details">
                <div class="name">
                    <?= htmlspecialchars($student['full_name']) ?>
                </div>

                <div class="dept">
                    <?= htmlspecialchars($student['department']) ?>
                </div>

                <div class="matric">
                    <?= htmlspecialchars($student['matric_no']) ?>
                </div>

            </div>
        </td>
    </tr>
</table>

<style>

    .building-table {
        table-layout: fixed;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .building-cell {
        padding: 0;
        margin: 0;
        vertical-align: top;
    }

    .building-img {
        height: 50mm;
        display: block;
    }
.red-cell {
    width: 90%;
    height: 50mm;
    background-color: #ed1b2f;
    text-align: center;
    vertical-align: middle;
    padding: 0;
    overflow: hidden;
}

/* .details {
    width: 100%;
} */

.name,
.matric,
.dept {
    font-family: Arial, sans-serif;
    font-size: 14pt;
    font-weight: bold;
     line-height: 2;
}


</style>