<?php 
	include 'connection.php';
	session_start();

	// initializing variables


	$product = "";
	$price = "";
	$aboutProduct = "";
	$image = "";
	$id = 0;
	$update = false;


	//Populating the database n saving image in 'images/'
	if(isset($_POST['save'])){//checking if form is ready
		//Assigning Variables
		$product = $_POST['product'];
		$price = $_POST['price'];
		$aboutProduct = $_POST['aboutProduct'];

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

						$sql="INSERT INTO royald(product,price,aboutProduct,image)VALUES(:product,:price,:aboutProduct,:image)";
						$stmt = $conn->prepare($sql);
						$stmt->execute(array(":product"=>$product ,":price"=>$price ,":aboutProduct"=>$aboutProduct ,":image"=>$file_New_Name ));

						echo "success";

					
					
					} else {
						$_SESSION["msg"]="Smaller sized file required!" ;
						header("Location: index2.php?uploadsuccess");
				   }
				} else {
					$_SESSION["msg"]="Error uploading file!" ;
					header("Location: index2.php?uploadsuccess");
				}
		   } else{
				$_SESSION["msg"]="File Format not supported!" ;
				header("Location: index2.php?uploadsuccess");
		   }
	   
	}
		$_SESSION["msg"]="Data Upload Successful!" ;
		header("Location: index2.php?uploadsuccess");
				   
	}

        
    //contact us
	if(isset($_POST['submit'])){
		//Assigning Variables
		$name = $_POST['name'];
		$phoneNumber = $_POST['phone'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$sql="INSERT INTO contactus(name,phoneNo,email,message)VALUES(:name,:phone,:email,:msg)";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array(":name"=>$name ,":phone"=>$phoneNumber ,":email"=>$email ,":msg"=>$message ));

		echo "success";
	
		$_SESSION["msg"]="Data Upload Successful!" ;
		header("Location: index2.php?uploadsuccess");
				   
	}
	


	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$count=$conn->prepare("DELETE FROM royald WHERE id=:id"); 
	$count->bindParam(":id",$id,PDO::PARAM_INT);
	$count->execute();
	header('location: index2.php');
}
if (isset($_GET['deli'])) {
	$id = $_GET['deli'];
	$count=$conn->prepare("DELETE FROM contactus WHERE id=:id"); 
	$count->bindParam(":id",$id,PDO::PARAM_INT);
	$count->execute();
	header('location: index2.php');
}
?>