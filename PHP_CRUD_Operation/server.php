<?php 
	include 'connection.php';
	session_start();

	// initializing variables
	$name = "";
	$age = "";
	$username = "";
	$address = "";
	$image = "";
	$id = 0;
	$update = false;


	//Populating the database n saving image in 'images/'
	if(isset($_POST['save'])){//checking if form is ready
		//Assigning Variables
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];

		//loading file; it's name, size, type etc where 'image' is the name of the input field(for file)
		if(isset($_FILES['image'])){ //Checking if the file input field is ready
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];
			$file_error = $_FILES['image']['error'];
			$file_ext=strtolower(end(explode('.',$file_name))); //splits on '.' while the last value is changed to lower class and savd in file_ext variable
			
			$extensions= array("mp4", "avi", "3gp", "jpeg","mp3","png","jpg"); //defining extensions to accept
			

			if(in_array($file_ext,$extensions)){//
				if($file_error === 0){
				   if ($file_size < 500000) {
						$file_New_Name = uniqid('', true).".".$file_ext;
						move_uploaded_file($file_tmp,"images/".$file_New_Name);
						mysqli_query($con, "INSERT INTO crudtable (name, age, username, address, image) VALUES ('$name', '$age','$username','$address','$file_New_Name')"); 
						} else {
						$_SESSION["msg"]="Smaller sized file required!" ;
						header("Location: index.php?uploadsuccess");
				   }
				} else {
					$_SESSION["msg"]="Error uploading file!" ;
					header("Location: index.php?uploadsuccess");
				}
		   } else{
				$_SESSION["msg"]="File Format not supported!" ;
				header("Location: index.php?uploadsuccess");
		   }

		   
	   
	}
		$_SESSION["msg"]="Data Upload Successful!" ;
		header("Location: index.php?uploadsuccess");
				   
	}

        
    //update/edit
	if(isset($_POST['update'])){//checking if form is ready
		//Assigning Variables
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];

		//loading file; it's name, size, type etc where 'image' is the name of the input field(for file)
		//if(isset($_POST['image'])){ //Checking if the file input field is ready
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];
			$file_error = $_FILES['image']['error'];
			$file_ext=strtolower(end(explode('.',$file_name))); //splits on '.' while the last value is changed to lower class and savd in file_ext variable
			
			$extensions= array("mp4", "avi", "3gp", "jpeg","mp3","png","jpg"); //defining extensions to accept
			

			if(in_array($file_ext,$extensions)){//
				if($file_error === 0){
				   if ($file_size < 500000) {
						$file_New_Name = uniqid('', true).".".$file_ext;
						move_uploaded_file($file_tmp,"images/".$file_New_Name);
						
						} else {
						$_SESSION["msg"]="Smaller sized file required!" ;
						header("Location: index.php?uploadsuccess");
				   }
				} else {
					$_SESSION["msg"]="Error uploading file!" ;
					header("Location: index.php?uploadsuccess");
				}
		   } else{
				$_SESSION["msg"]="File Format not supported!" ;
				header("Location: index.php?uploadsuccess");
		   }

		   
	   
	}	
		mysqli_query($con, "UPDATE crudtable SET name='$name', age='$age', username= '$username', address= $address, image = $file_New_Name WHERE id=$id") ;
		$_SESSION["msg"]="Data Upload Successful!" ;
		header("Location: index.php?uploadsuccess");
				   
	}
	
	


	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM crudtable WHERE id=$id");
	header('location: index.php');
}


?>