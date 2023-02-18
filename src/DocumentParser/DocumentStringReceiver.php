<?php
namespace DocumentParser;

if (!defined('JOIN_CORE') || !JOIN_CORE) die();
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use WorkWithFiles\UploadedFileSearcher;

class DocumentStringReceiver {

    protected array $documentResult = array();
    protected array $source = array();

    function getAllUploadedFilesPath() {
        $this->source = (new UploadedFileSearcher())->loadAllFilesPath();
        unset($this->source[0]);
        unset($this->source[1]);
    }

    function getDocumentsLengthAndName(): void {
        if ($this->source) {
            foreach ($this->source as $sourceKey) {
                $str = '';
                $phpWord = IOFactory::load($sourceKey);
                foreach ($phpWord->getSections() as $section) {
                    $arrays = $section->getElements();
                    foreach ($arrays as $e) {
                        if (get_class($e) === "PhpOffice\PhpWord\Element\TextRun") {
                            foreach ($e->getElements() as $text)
                                if (get_class($text)!="PhpOffice\PhpWord\Element\TextBreak"){
                                    $str .= $text->getText();
                                }
                        }
                    }
                    break;
                }
                $this->documentResult[substr(strrchr($sourceKey, "/"), 1)] = strlen($str);
            }
        }
    }

    function getDocumentResult(): array {
        return $this->documentResult;
    }

}