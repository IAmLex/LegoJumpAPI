<?php
    include_once 'Classes/InitPDO.php';
    include_once 'Classes/LevelsController.php';
    include_once 'Classes/Utilities.php';

    $levelName = $_POST['levelName'];

    // Select the level by name
    $levelsController = new LevelsController();
    $level = $levelsController->GetLevelByName($levelName);

    // Error handling
    if (!$level) {
        echo "Error #0001: Level not found.";
        die();
    }

    // Retrieve the json and echo the file
    $filepath = $level['filepath'];

    echo Utilities::ReadFile($filepath);