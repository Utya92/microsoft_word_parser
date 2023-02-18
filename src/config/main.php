<?php
//script defender
if (!defined('JOIN_CORE')) define('JOIN_CORE', true);

//allowed upload elements
const ALLOWED_UPLOADS = [
    "MS_WORD_DOCX" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    "MS_WORD_DOC" => "application/msword"
];

const UPLOADED_FILES_PATH = "src/upload";