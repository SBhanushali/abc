<?php
function dbConnect(){
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "usha";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	return $conn;
}

function saveData($name, $address, $salary) {
	$conn = dbConnect();

	$insert_query = "INSERT INTO employee VALUES ('".$name."', '".$address."', ".$salary.");";
	
	if(mysqli_query($conn, $insert_query)) {
		echo "success";
	}
	
	mysqli_close($conn);
}

function getData() {
	$conn = dbConnect();
	
	$select_query = "SELECT * FROM employee";
	
	$result = mysqli_query($conn, $select_query);
	if(!$result) {
		die();
	}
	
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	print json_encode($rows);
}