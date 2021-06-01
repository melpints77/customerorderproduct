
<?php include ('../partials/menu.php'); ?>

<?php
			if(isset($_SESSION['add'])) 
			{
				echo $_SESSION['add']; 
				unset($_SESSION['add']);
			}
		?>
		
<?php

	if (isset($_POST['submit']))
	{
		
		                $SupplierName=$_POST['SupplierName'];
		                $SupplierAddressStreet=$_POST['SupplierAddressStreet'];
		                $SupplierAddressCity=$_POST['SupplierAddressCity'];
		                $SupplierAddressCountry=$_POST['SupplierAddressCountry'];
		                $SupplierAddressPostCode=$_POST['SupplierAddressPostCode'];
		                $SupplierPhoneNo=$_POST['SupplierPhoneNo'];
		                $SupplierFaxNo=$_POST['SupplierFaxNo'];
		                $PaymentTerms=$_POST['PaymentTerms'];
		                //Display the Values in our Table

		//2.SQL Query to Save the data into database
		$sql = "INSERT INTO tblsuppliers SET
			SupplierName='$SupplierName',
			SupplierAddressStreet='$SupplierAddressStreet',
			SupplierAddressCity='$SupplierAddressCity',
			SupplierAddressCountry='$SupplierAddressCountry',
			SupplierAddressPostCode='$SupplierAddressPostCode',
			SupplierPhoneNo='$SupplierPhoneNo',
			SupplierFaxNo='$SupplierFaxNo',
			PaymentTerms = '$PaymentTerms'
		";

		//3.Executing Query and Saving Data into Database
		$res = mysqli_query($conn, $sql);

		//4. Check whether the (Query is Executed) data is inserter or not and display appropriate message
		if($res==TRUE)
		{
			
			$_SESSION['add'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Supplier Added Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect
			header("location:".SITEURL.'main/suppliers.php');
		}
		else
		{
			$_SESSION['add'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Add Supplier!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect 
			header("location:".SITEURL.'main/suppliers.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> SUPPLIERS </title>

	<!-- For bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- font awesome --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <!-- for css -->
    <link rel="stylesheet" type="text/css" href="../style/op.css">

</head>
<body>

<div class="container">

	<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-4">
    	<label><strong> SUPPLIER NAME </strong></label>
      <input type="text" name="SupplierName" placeholder="SupplierName" class="form-control" required>
    </div>
    <div class="form-group col-md-5">
    	<label><strong> STREET </strong></label>
      <input type="text" name="SupplierAddressStreet" placeholder="SupplierAddressStreet" class="form-control" required>
    </div>
  <div class="form-group col-md-3">
  	<label><strong> CITY </strong></label>
    <input type="text" name="SupplierAddressCity" placeholder="SupplierAddressCity" class="form-control" required>
  </div>
</div>
  <div class="form-row">
  	<div class="form-group col-md-4">
  	<label><strong> COUNTRY </strong></label>
   	<input type="text" name="SupplierAddressCountry" placeholder="SupplierAddressCountry" class="form-control" required>
  </div>
    <div class="form-group col-md-4">
    	<label><strong> POST CODE</strong></label>
      <input type="text" name="SupplierAddressPostCode" placeholder="SupplierAddressPostCode" class="form-control" required>
    </div>
    <div class="form-group col-md-4">
    	<label><strong> PHONE NUMBER </strong></label>
      <input type="number" name="SupplierPhoneNo" placeholder="SupplierPhoneNo" class="form-control" min="0" required>
      </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    	<label><strong> FAX NUMBER </strong></label>
      <input type="number" name="SupplierFaxNo" placeholder="SupplierFaxNo" class="form-control" min="0" required>
      </div>
    <div class="form-group col-md-6">
    	<label><strong> PAYMENT TERMS </strong></label>
      <input type="text" name="PaymentTerms" placeholder="PaymentTerms" class="form-control" required>
    </div>

  </div>
  <button type="submit" name="submit" class="btn btn-info"> <i class="fas fa-plus"> NEW SUPPLIER </i> </button>
</form>
</div>

</body>
</html>