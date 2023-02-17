<?php

namespace Handlers;

class FileHandler {
    protected array $validTypes = array(
        "MS_WORD_DOCX" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        "MS_WORD_DOC" => "application/msword"
    );
    protected string $uploadPath = "src/upload";
    protected bool $isPresentFiles = false;
    public bool $isValidTypes = true;
    public array $message = array();
    public array $uploadFilesTo = array();


    function checkPresentFiles(array $arr): void {
        if (isset($arr['file']) && $_SERVER["REQUEST_METHOD"] === "POST") {
            $this->isPresentFiles = isset($arr);
        } else $this->message[] = "Файл не выбран";
    }

    function checkValidFileType(array $arr): void {
        if (isset($arr['file']['type'])) {
            for ($i = 0; $i < count($arr['file']['type']); $i++) {
                if ($arr["file"]["type"][$i] !== $this->validTypes["MS_WORD_DOCX"] &&
                    $arr["file"]["type"][$i] !== $this->validTypes["MS_WORD_DOC"]) {
                    $this->isValidTypes = false;
                    $this->message[] = "File isn't valid!";
                    break;
                }
            }
        }
    }

    function upload(array $arr): void {
        if ($this->isPresentFiles && $this->isValidTypes) {
            for ($i = 0; $i < count($arr['file']['type']); $i++) {
                $this->uploadFilesTo[$i] = $this->uploadPath . "/" . ($arr['file']['name'][$i]);
                move_uploaded_file($arr['file']['tmp_name'][$i], $this->uploadFilesTo[$i]);
                $this->message[] = "files was uploaded!";
            }
        } else $this->message[] = "upload is failed";
    }

    function showView() {
        require 'src/static/views/.default/load_form.php';
    }
}


