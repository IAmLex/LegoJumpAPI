<?php
include 'initMysql.php';

$sql = "SELECT * FROM level WHERE standard = 'Y' ORDER BY name";

$result = $mysqli->query($sql) or die($mysqli->error);

$row = $result->fetch_assoc();

echo json_encode($row);
