<?php
	
	//Include constants.php file here
	include('../connection/connection.php');
	
	//1. Get the ID of Supplier to be deleted
	$SupplierID = $_GET['SupplierID'];

	//2. Create SQL Query to Delete Supplier
	$sql = "DELETE FROM tblsuppliers WHERE SupplierID=$SupplierID";

	//Execute the Query
	$res = mysqli_query($conn, $sql);

	//Check whether the query executed successfully or not
	if($res==TRUE)
	{
		
		$_SESSION['delete'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Supplier Deleted Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		
		header('location:'.SITEURL.'main/suppliers.php');
	}
	else
	{

		$_SESSION['delete'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Delete Supplier!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
		header('location:'.SITEURL.'main/suppliers.php');

	}

?>