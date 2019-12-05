<?php
include_once 'initMysql.php';

$levelId = $_GET['id']; 

$sql = "SELECT * FROM level WHERE id = {$levelId}";

$result = $mysqli->query($sql) or die($mysqli->error);

$row = $result->fetch_assoc();

echo json_encode($row);
