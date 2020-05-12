<?php
    include_once 'Classes/InitPDO.php';
    include_once 'Classes/LevelsController.php';
    include_once 'Classes/Utilities.php';

    // POST /selectLevelById.php
    // data: levelID : int

    $levelID = $_POST['levelID'];

    // Select the level by ID
    $levelsController = new LevelsController();
    $level = $levelsController->GetLeveLByID($levelID);

    // Error handling
    if (!$level) {
        echo "Error #0001: Level not found.";
        die();
    }

    // Retrieve the json and echo the file
    echo Utilities::ReadFile($level['filepath']);