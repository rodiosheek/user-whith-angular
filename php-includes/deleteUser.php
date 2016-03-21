<?php
require_once('./db-connect/Connect.php');

$id = json_decode(file_get_contents('php://input'), true);


require_once('./db-connect/Connect.php');

$connect = new Connect();
$mysqli = $connect->getConnect();

$result = $mysqli->query("DELETE FROM user WHERE id = " . $id);


