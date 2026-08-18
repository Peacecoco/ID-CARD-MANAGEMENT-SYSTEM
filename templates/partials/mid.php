<?php
// ============================================================
// templates/partials/middle.php
//
// Middle section of the ID card.
// Expects in scope:
//   $student
//   $middlePhotoPath
// ============================================================
?>

<table
    class="middle-table"
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
>
    <tr>

        <!-- ==================================================
             LEFT: STUDENT PHOTO
             ================================================== -->
        <td
            class="photo-cell"
            width="42%"
            valign="middle"
        >
            <?php if (!empty($middlePhotoPath)): ?>
                <img
                    src="<?= htmlspecialchars($middlePhotoPath) ?>"
                    class="student-photo"
                    alt="Student Photo"
                >
            <?php endif; ?>
        </td>


        <!-- ==================================================
             RIGHT: STUDENT INFORMATION
             ================================================== -->
        <td
            class="student-info-cell"
            width="58%"
            valign="middle"
        >

            <div class="student-name">
                <?= htmlspecialchars(
                    $student['full_name']
                    ?? $student['name']
                    ?? ''
                ) ?>
            </div>

            <div class="student-programme">
                <?= htmlspecialchars(
                    $student['programme']
                    ?? $student['course']
                    ?? ''
                ) ?>
            </div>

            <div class="student-number">
                <?= htmlspecialchars(
                    $student['student_number']
                    ?? $student['matric_number']
                    ?? $student['matric_no']
                    ?? ''
                ) ?>
            </div>

        </td>

    </tr>
</table>


<style>

/* ============================================================
   MIDDLE SECTION
   ============================================================ */

.middle-table {
    width: 100%;
    height: <?= MIDDLE_HEIGHT_MM ?>mm;

    border-collapse: collapse;
    border-spacing: 0;

    margin: 0;
    padding: 0;

    table-layout: fixed;
}

.middle-table tr {
    height: <?= MIDDLE_HEIGHT_MM ?>mm;

    margin: 0;
    padding: 0;
}


/* ============================================================
   PHOTO
   ============================================================ */

.photo-cell {
    width: 42%;

    height: <?= MIDDLE_HEIGHT_MM ?>mm;

    margin: 0;
    padding: 0;

    vertical-align: middle;
    text-align: center;

    overflow: hidden;
}

.student-photo {
    display: block;

    width: 100%;
    height: <?= MIDDLE_HEIGHT_MM ?>mm;

    object-fit: cover;

    margin: 0;
    padding: 0;
}


/* ============================================================
   STUDENT INFORMATION
   ============================================================ */

.student-info-cell {
    width: 58%;

    height: <?= MIDDLE_HEIGHT_MM ?>mm;

    margin: 0;

    padding: 2mm 2mm 2mm 2mm;

    background-color: #ff0000;

    vertical-align: middle;

    text-align: left;
}


/* ============================================================
   STUDENT NAME
   ============================================================ */

.student-name {
    margin: 0 0 7mm 0;
    padding: 0;

    font-family: "Times New Roman", serif;

    font-size: 5mm;
    line-height: 1.15;

    color: #000000;
}


/* ============================================================
   PROGRAMME
   ============================================================ */

.student-programme {
    margin: 0 0 7mm 0;
    padding: 0;

    font-family: "Times New Roman", serif;

    font-size: 5mm;
    line-height: 1.15;

    color: #000000;
}


/* ============================================================
   STUDENT NUMBER
   ============================================================ */

.student-number {
    margin: 0;
    padding: 0;

    font-family: "Times New Roman", serif;

    font-size: 5mm;
    line-height: 1.15;

    color: #000000;
}

</style>