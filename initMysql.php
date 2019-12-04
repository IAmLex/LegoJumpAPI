<?php
    //Remote Server
    // $servername = "192.168.0.4";
    // $username = "root";
    // $password = "Welkom01!";
    // $database = "playerhistory";

    //Local server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }