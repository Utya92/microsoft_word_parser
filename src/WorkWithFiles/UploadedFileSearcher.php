<?php

namespace WorkWithFiles;

class UploadedFileSearcher {
    protected array $allFilesPath = array();
    protected array $source = array();

    function loadAllFilesPath(): array {
        $handle = opendir("src/upload");
        if ($handle) {
            while (($entry = readdir($handle)) !== false) {
                $this->allFilesPath[] = "src/upload/" . $entry;
            }
        }
        closedir($handle);
        return $this->allFilesPath;
    }
}