<?php

$id = json_decode(file_get_contents('php://input'), true);


require_once('./db-connect/Connect.php');

$connect = new Connect();
$mysqli = $connect->getConnect();

$result = $mysqli->query("SELECT name, phone, email FROM user WHERE id = " . $id)->fetch_array();

echo $json_response =  json_encode($result);
