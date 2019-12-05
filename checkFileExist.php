<?php
    // Check if a given file is existent in the levels folder
    // GET /checkFileExist.php/?levelName=LEVELNAME

    // POST /checkFileExist.php
    // data: levelName : string
    
    include_once 'Classes/InitPDO.php';
    include_once 'Classes/LevelsController.php';
    include_once 'Classes/Utilities.php';

    $levelName = $_POST['levelName'];

    $levelController = new LevelsController();
    $result = $levelController->GetLevelByName($levelName);

    $formattedLevelName = Utilities::FormatString($levelName);
    $filepath = "levels/{$formattedLevelName}.json";

    if (file_exists($filepath)) {
        echo "true";
    } else {
        echo "false";
    }