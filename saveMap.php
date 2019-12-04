<?php
    include 'initMysql.php';

    $space = "&#32;";

    // Get the next available ID
    $sql = "SELECT id FROM level ORDER BY id DESC LIMIT 1";         //Select latest ID
    $result = $mysqli->query($sql) or die($mysqli->error);          //Execute query
    $row = $result->fetch_assoc();                                  //Go through results // Save result to $row
    $nextId = $row['id'] + 1;                                       //Latest ID + 1

    $targetDir = "levels/";                                         //Name of the folder1
    $filename = str_replace(" ", $space, $_GET['levelName'];
    // $filename = "Level_".$nextId;                                   //Name of the file
    $content = ['Name' => 'First level'];                           //The content for the file
    $ext = "json";                                                  //The file extension
    $filepath = $targetDir.$filename.".".$ext;                      //The full path

    // Check if the same file already exists
    if (file_exists($filepath)) {
        

        $fp = fopen($filepath, 'w');
        fwrite($fp, json_encode($content));
        fclose($fp);

        

        echo "Succesfully saved the map!";



    } else {

        $fp = fopen($filepath, 'w');
        fwrite($fp, json_encode($content));
        fclose($fp);

        echo "You've, succesfully overwritten your file!";
        
    }