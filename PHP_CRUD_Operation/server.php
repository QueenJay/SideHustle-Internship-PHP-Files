<?php 
	include 'connection.php';
	session_start();

	// initialize variables
	$name = "";
	$age = "";
	$username = "";
	$address = "";
	$id = 0;
	$update = false;
	
	//For Insert
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];

		mysqli_query($con, "INSERT INTO crudtable (name, age, username, address) VALUES ('$name', '$age', '$username', '$address')");
		$_SESSION["msg"]="User details saved";  
		header('location: index.php'); //to return to index page after saving
	}

		//For Update
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];

		mysqli_query($con, "UPDATE crudtable SET name='$name', age='$age', username= $username, address= $address WHERE id=$id");
		$_SESSION["msg"]="User details updated"; 
		header('location: index.php');
	}
	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM crudtable WHERE id=$id");
	header('location: index.php');
}


?>