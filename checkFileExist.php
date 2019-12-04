<?php
    // Check if a given file is existent in the levels folder
    // GET /checkFileExist.php/?levelName=LEVELNAME

    // POST /checkFileExist.php
    // data: levelName : string
    
    include 'initMysql.php';

    $levelName = $_POST['levelName'];
    echo $levelName;

    // // $levelName = $_GET['levelName'];
    // // $query = "SELECT level_name FROM levels WHERE level_name = ? LIMIT 1";
    // $query = "INSERT INTO `levels`(`path`, `level_name`) VALUES (?, ?)";
    // $stmt = $mysqli->prepare($query);
    // // $stmt->bind_param("s", $levelName);
    // $stmt->bind_param("ss", $filePath, $levelName);
    // $result = $stmt->execute()->num_rows();

    $stmt = $mysqli->prepare("SELECT * FROM `levels` WHERE level_name = ?");
    $stmt->bind_param("s", $levelName);

    if ($stmt->execute()) {
        var_dump($stmt);
    }
    die();

    //fetching result would go here, but will be covered later

    echo $result;
    die();

    $directory = "levels/";
    $extension = ".json";
    $fileName  = $levelName . $extension;
    $filePath  = $directory . $fileName;

    if (file_exists($filePath)) {
        echo "true";
        die();
    }

    echo "false";