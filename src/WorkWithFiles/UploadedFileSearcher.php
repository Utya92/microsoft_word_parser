<?php
namespace WorkWithFiles;

if (!defined('JOIN_CORE') || !JOIN_CORE) die();

class UploadedFileSearcher {
    protected array $uploadedFilesPath = array();

    function loadAllFilesPath(): array {
        $handle = opendir(UPLOADED_FILES_PATH);
        if ($handle) {
            while (($entry = readdir($handle)) !== false) {
                $this->uploadedFilesPath[] = UPLOADED_FILES_PATH . '/' . $entry;
            }
        }
        closedir($handle);
        return $this->uploadedFilesPath;
    }
}