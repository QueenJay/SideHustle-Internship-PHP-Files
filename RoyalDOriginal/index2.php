<?php 

 include('server.php');
 	if (isset($_GET['edit'])) {
 		$id = $_GET['edit'];
		$update = true;

 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop Classy </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php 
	if(isset($_SESSION["msg"])): ?>
		<div class="msg">
		  <?php 
			echo $_SESSION["msg"];
			unset($_SESSION["msg"]);
		  ?>
		</div>

	<?php endif ?>

<?php 
	$query = $conn->prepare( "SELECT * FROM royald");
	$query->execute();
	//$results = mysqli_query($con, "SELECT * FROM crudtable"); 
?>

<table>
	<thead>
		<tr>
			<th>Product</th>
			<th>Price</th>
			<th>About</th>
			<th>Picture</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	

	<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?php echo $row['product']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['aboutProduct']; ?></td>
			<td><img src= '<?php echo 'images/'.$row['image']; ?>' height='40px' width='40px' alt ="Picture"> </td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>





<form method="post" action="server.php" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php //echo $id; ?>">

	<div class="input-group">
		<label>Product Name</label>
		<input type="text" name="product" value="<?php //echo $name; ?>">
	</div>
	<div class="input-group">
		<label>Price</label>
		<input type="text" name="price" value="<?php //echo $age; ?>">
	</div>
	<div class="input-group">
		<label>About the Product</label>
		<input type="text" name="aboutProduct" value="<?php //echo $address; ?>">
	</div>
	<div class='input-group'>
        <label>Picture</label>
        <input type='file' name='image'  src="<?php// echo 'images/'.$image; ?>" >
    </div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>

	
</form>

<?php 
	$query = $conn->prepare( "SELECT * FROM contactus");
	$query->execute();
	//$results = mysqli_query($con, "SELECT * FROM crudtable"); 
?>

<table>
	<thead>
		<tr>
			<th>name</th>
			<th>PhoneNo</th>
			<th>Email</th>
			<th>Message</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	

	<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['phoneNo']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['message']; ?></td>
			<td>
				<a href="server.php?deli=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>