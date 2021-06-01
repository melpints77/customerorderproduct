<?php
	
	//Include constants.php file here
	include('../connection/connection.php');
	
	
	$OrderID = $_GET['OrderID'];

	
	$sql = "DELETE FROM tblorders WHERE OrderID=$OrderID";

	
	$res = mysqli_query($conn, $sql);

	//Check whether the query executed successfully or not
	if($res==TRUE)
	{
	
		$_SESSION['delete'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Order Deleted Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		header('location:'.SITEURL.'main/orders.php');
	}
	else
	{

		$_SESSION['delete'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Delete Order!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		header('location:'.SITEURL.'main/orders.php');

	}

?>