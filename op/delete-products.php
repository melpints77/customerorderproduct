<?php
	
	//Include constants.php file here
	include('../connection/connection.php');
	
	//1. Get the ID of Product
	$ProductID = $_GET['ProductID'];

	//2. Create SQL Query to Delete Product
	$sql = "DELETE FROM tblproducts WHERE ProductID=$ProductID";

	//Execute the Query
	$res = mysqli_query($conn, $sql);

	//Check whether the query executed successfully or not
	if($res==TRUE)
	{
		
		$_SESSION['delete'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Product Deleted Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		header('location:'.SITEURL.'main/products.php');
	}
	else
	{
	
		$_SESSION['delete'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Delete Product!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		header('location:'.SITEURL.'main/products.php');

	}


?>