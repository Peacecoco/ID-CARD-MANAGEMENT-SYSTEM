<?php
// ============================================================
// templates/back/shared_back.php
//
// One shared back template for ALL colleges (confirmed identical
// text across colleges). Deliberately pure black on white/transparent,
// no color values anywhere, so this side can be routed to a K-only
// ribbon panel rather than a full YMC color pass.
//
// Expects in scope: $student (array)
// ============================================================
?>
<div class="card-back">
    <div class="line">This is to certify that the bearer whose</div>
    <div class="line">picture appears on this card is a </div>
    <div class="line">student of Covenant University.</div>
    <div class="line">No person(s) unless authorized</div>
    <div class="line">by the above instituional authority.</div>
    <div class="line">may hold or possess the card.</div>
    <div class="line">Please if found kindly return </div>
    <div class="line">to the Registrar,</div>
    <div class="line">COVENANT UNIVERSITY</div>
    <div class="line">Km. 10 Idiroko Road, Canaan Land,</div>
    <div class="line">P.M.B 1023,Ota ,Ogun State, Nigeria.</div>
    <div class="line">Tel: +234-8115762473, 08171613173,</div>
    <div class="line">07066553483</div>
    <div class="line">registrar@covenantuniversity.edu.ng</div>
    <div class="signature-area">
        <img
            src="<?= htmlspecialchars(__DIR__ . '/../../assets/images/registrar_signature.png') ?>"
            class="registrar-signature"
            alt="Registrar's Signature"
        >

        <div class="signature-line">________________________</div>
        <div class="signature-label">Registrar's Signature</div>
    </div>
    
</div>
<style>
    .card-back {
        width: <?= CARD_WIDTH_MM ?>mm;
        height: <?= CARD_HEIGHT_MM ?>mm;
        font-family: Arial, sans-serif;
        font-size: 6.5pt;
        /* pure black only, intentionally. do not add color here. */
        color: #000000;
        background-color: #ffffff;
        padding: 4mm;
        box-sizing: border-box;
        text-align: center;
        font-weight: bold;
    }
    .card-back .line {
        margin-bottom: 1.5mm;
    }

    /* Signature section */
    .signature-area {
        margin-top: 1.5mm;
        text-align: center;
    }

    .registrar-signature {
        width: 22mm;
        height: 7mm;
        display: block;
        margin: 0 auto;
    }

    .signature-line {
        margin: 0;
        padding: 0;
        line-height: 1;
    }

    .signature-label {
    margin-top: 0.8mm;
    line-height: 1;
    }
</style>
