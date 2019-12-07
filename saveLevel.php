<?php
    // Save the given JSON on the server and save path to database

    // POST /saveLevel.php
    // data: levelData : string (JSON)
    
    include_once 'Classes/InitPDO.php';
    include_once 'Classes/LevelsController.php';
    include_once 'Classes/Utilities.php';

    $jsonData = json_decode($_POST['levelData']);
    $levelName = $jsonData->levelName;
    
    $formattedLevelName = str_replace(" ", "&#32;", $levelName); 
    $filepath = "levels/{$formattedLevelName}.json";

    Utilities::SaveFile($filepath, json_encode($jsonData));

    $levelsController = new LevelsController();
    $result = $levelsController->StoreLevel($filepath, $levelName);

    if ($result) {
        echo "succes";
    } else {
        echo "failure";
    }