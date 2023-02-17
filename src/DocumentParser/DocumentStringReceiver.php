<?php

namespace DocumentParser;

require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use WorkWithFiles\UploadedFileSearcher;

class DocumentStringReceiver {

    public array $docLengthArr = array();
    protected array $source = array();

    function getSource() {
        $this->source = (new UploadedFileSearcher())->loadAllFilesPath();
        unset($this->source[0]);
        unset($this->source[1]);
    }

    function getDocumentsLength() {
        if ($this->source) {
            foreach ($this->source as $sourceKey) {
                $str = '';
                $phpWord = IOFactory::load($sourceKey);
                foreach ($phpWord->getSections() as $section) {
                    $arrays = $section->getElements();
                    foreach ($arrays as $e) {
                        if (get_class($e) === "PhpOffice\PhpWord\Element\TextRun") {
                            foreach ($e->getElements() as $text)
                                $str .= $text->getText();
                        }
                    }
                    break;
                }
                $this->docLengthArr[][substr(strrchr($sourceKey, "/"), 1)] = strlen($str);
            }
        }
    }
}