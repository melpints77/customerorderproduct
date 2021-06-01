<?php
	
	//Include constants.php file here
	include('../connection/connection.php');
	
	$CustomerID = $_GET['CustomerID'];

	$sql = "DELETE FROM tblcustomers WHERE CustomerID=$CustomerID";

	//Execute the Query
	$res = mysqli_query($conn, $sql);

	//Check whether the query executed successfully or not
	if($res==TRUE)
	{
		
		$_SESSION['delete'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Customer Deleted Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		
		header('location:'.SITEURL.'main/customers.php');
	}
	else
	{

		$_SESSION['delete'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Delete Customer!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		header('location:'.SITEURL.'main/customers.php');

	}

?>