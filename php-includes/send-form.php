<?php

$data = json_decode(file_get_contents('php://input'), true);
echo json_encode($data);
$data['name'] = htmlspecialchars($data['name']);
$data['phone'] = htmlspecialchars($data['phone']);
$data['email'] = htmlspecialchars($data['email']);
require_once('./db-connect/Connect.php');
$connect = new Connect();
$mysqli = $connect->getConnect();

if (!($stmt = $mysqli->prepare("INSERT INTO user (name, phone, email)
                                        VALUES (?, ?, ?)"))) {
	echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
$date = time();
if (!$stmt->bind_param('sss',
	$data['name'],
	$data['phone'],
	$data['email']))
{
	echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!$stmt->execute()) {
	echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}