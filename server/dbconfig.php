<?php

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DBNAME = 'bank_dihan';

// connection

$conn = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DBNAME);

if ($conn) {
	//echo "Connected Successfully!!!";
} else {
	die(mysqli_error($conn));
}


?>