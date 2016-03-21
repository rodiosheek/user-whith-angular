<?php

$data = json_decode( file_get_contents( 'php://input' ), true );
echo json_encode( $data );
require_once( './db-connect/Connect.php' );
$connect = new Connect();
$mysqli  = $connect->getConnect();
$name    = htmlspecialchars( $data['name'] );
$phone   = htmlspecialchars( $data['phone'] );
$email   = htmlspecialchars( $data['email'] );
$id      = htmlspecialchars( $data['id'] );

if ( ! ( $stmt = $mysqli->prepare( "UPDATE user SET name = ?, phone = ?, email = ? WHERE id =" . $id ) ) ) {
	echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
$date = time();
if ( ! $stmt->bind_param( 'sss',
	$data['name'],
	$data['phone'],
	$data['email'] )
) {
	echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
}
if ( ! $stmt->execute() ) {
	echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
