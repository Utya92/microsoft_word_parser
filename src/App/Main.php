<?php
namespace App;

if (!defined('JOIN_CORE') || !JOIN_CORE) die();

use Handlers\FileHandler;
use DocumentParser\DocumentStringReceiver;

class Main {
    public function execute() {
        $inputData = $_FILES;

        $app = new FileHandler();
        $receiver = new DocumentStringReceiver();
        $app->checkPresentFiles($inputData);
        $app->checkValidFileType($inputData);
        $app->upload($inputData);
//debug($app->uploadFilesTo);
//debug($app->message);

        $receiver->getAllUploadedFilesPath();
        $receiver->getDocumentsLengthAndName();

//debug($receiver->docLengthArr);
        $app->showView($receiver->getDocumentResult());
    }
}