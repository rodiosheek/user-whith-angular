<?php
require_once('./db-connect/Connect.php');

$connect = new Connect();
$mysqli = $connect->getConnect();

$result = $mysqli->query("SELECT * FROM user");
$entry = array();
while ($row = $result->fetch_assoc()) {
	$entry [] = $row;
}
echo $json_response =  json_encode($entry);
