<? if (!defined('JOIN_CORE') || !JOIN_CORE) die(); ?>

<link rel="stylesheet" href="src/static/views/.default/style.css">
<form enctype="multipart/form-data" action="../../../../index.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
    <input type='file' name='file[]' class='file-drop' id='file-drop' multiple required><br>
    <br>
    <br>
    <input type='submit' value='Upload'>
    <br>
    <br>
</form>
<?php if ($arResult["FILES_LOGS"] && $arResult["IS_VALID"]): ?>
    <div class="docs-count">
        <hr>
        <h3> Количество загруженных документов: <span><?= count($arResult["FILES_LOGS"]) ?>
        </span>
        </h3>
    </div>
<?php endif; ?>
<?php if (!$arResult["IS_VALID"]): ?>
    <div class="not-valid">
        <hr>
        ERROR! Files isn't VALID. Allowed format: .DOC/.DOCX
    </div>
    <?php die() ?>
<?php endif; ?>

<?php foreach ($arResult["DOCUMENT_LENGTH"] as $el => $val): ?>

    <div class="message">
        <hr>
        <span class="doc-field">Имя документа: "<?= $el ?>"</span>
        <br>
        <span class="doc-field">Количество всех символов в документе : "<?= $val ?> "</span>
        <hr>
    </div>
<?php endforeach; ?>


