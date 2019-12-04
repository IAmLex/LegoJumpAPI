<?php
    // Save the given JSON on the server and save path to database
    // GET /saveMap2.0.php/?mapData=JSONOFMAPDATA

    // POST /saveMap2.0.php
    // data: mapData : string (JSON)
    
    include 'initMysql.php';

    $jsonData = json_decode($_POST['mapData']);
    // $jsonData = json_decode($_GET['mapData']);

    $levelName = $jsonData->levelName;
    $fLevelName = str_replace(" ", "&#32;", $LevelName); 
    
    $directory = "levels/";
    $extension = ".json";
    $fileName  = $fLevelName . $extension;
    $filePath  = $directory . $fileName;

    // Save the file
    // TODO: Add save file class
    $fp = fopen($filePath, 'w');
    fwrite($fp, json_encode($jsonData));
    fclose($fp);

    // Store path in database
    // TODO: Add database/store class
    $query = "INSERT INTO `levels`(`path`, `level_name`) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $filePath, $levelName);
    $result = $stmt->execute();

    if ($result) {
        echo " succes";
    } else {
        echo "failure";
    }