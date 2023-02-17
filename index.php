<?php

use Handlers\FileHandler;
use DocumentParser\DocumentStringReceiver;


require 'src/init.php';

$inputData = $_FILES;

$app = new FileHandler();
$receiver= new DocumentStringReceiver();
$app->showView();
$app->checkPresentFiles($inputData);
$app->checkValidFileType($inputData);
$app->upload($inputData);
debug($app->uploadFilesTo);
debug($app->message);


$receiver->getSource();
$receiver->getDocumentsLength();

debug($receiver->docLengthArr);

