<?php include ('../partials/menu.php'); ?>

			<?php
				$SupplierID=$_GET['SupplierID'];

				//2. Create SQL Query to Get the Details
				$sql= "SELECT * FROM tblsuppliers WHERE SupplierID=$SupplierID";

				//Execute the Query
				$res=mysqli_query($conn, $sql);

				//Check whether the query is executed or not
				if($res==TRUE)
				{
					//Check whether the data is available or not
					$count = mysqli_num_rows($res);
					
					if($count==1)
					{
						$row=mysqli_fetch_assoc($res);

		                $SupplierName=$row['SupplierName'];
		                $SupplierAddressStreet=$row['SupplierAddressStreet'];
		                $SupplierAddressCity=$row['SupplierAddressCity'];
		                $SupplierAddressCountry=$row['SupplierAddressCountry'];
		                $SupplierAddressPostCode=$row['SupplierAddressPostCode'];
		                $SupplierPhoneNo=$row['SupplierPhoneNo'];
		                $SupplierFaxNo=$row['SupplierFaxNo'];
		                $PaymentTerms=$row['PaymentTerms'];
		                //Display the Values in our Table
                
					}
					else
					{
						//Redirect 
						header('location:'.SITEURL.'main/suppliers.php');
					}
				}

			?>
			

	<?php

	//Check whether the submit button is clicked or not
	if(isset($_POST['submit']))
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

		//Create a SQL Query
		$sql = "UPDATE tblsuppliers SET
			SupplierName='$SupplierName',
			SupplierAddressStreet='$SupplierAddressStreet',
			SupplierAddressCity='$SupplierAddressCity',
			SupplierAddressCountry='$SupplierAddressCountry',
			SupplierAddressPostCode='$SupplierAddressPostCode',
			SupplierPhoneNo='$SupplierPhoneNo',
			SupplierFaxNo='$SupplierFaxNo',
			PaymentTerms = '$PaymentTerms'
			where SupplierID = '$SupplierID'
		";

		//Execute the Query
		$res=mysqli_query($conn, $sql);

		//Check whether the query executed successfully or not
		if($res==TRUE)
		{
			//Query executed 
			$_SESSION['update'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Supplier Updated Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect 
			header('location:'.SITEURL.'main/suppliers.php');
		}
		else
		{
			$_SESSION['update'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Update Supplier!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect 
			header('location:'.SITEURL.'main/suppliers.php');
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
      <input type="text" name="SupplierName" class="form-control" value="<?php echo $SupplierName;?>" required>
    </div>
    <div class="form-group col-md-5">
    	<label><strong> STREET </strong></label>
      <input type="text" name="SupplierAddressStreet" class="form-control" value="<?php echo $SupplierAddressStreet;?>" required>
    </div>
  <div class="form-group col-md-3">
  	<label><strong> CITY </strong></label>
    <input type="text" name="SupplierAddressCity" class="form-control" value="<?php echo $SupplierAddressCity;?>" required>
  </div>
</div>
  <div class="form-row">
  	<div class="form-group col-md-4">
  	<label><strong> COUNTRY </strong></label>
   	<input type="text" name="SupplierAddressCountry" class="form-control" value="<?php echo $SupplierAddressCountry;?>" required>
  </div>
    <div class="form-group col-md-4">
    	<label><strong> POST CODE</strong></label>
      <input type="text" name="SupplierAddressPostCode" class="form-control" value="<?php echo $SupplierAddressPostCode;?>" required>
    </div>
    <div class="form-group col-md-4">
    	<label><strong> PHONE NUMBER </strong></label>
      <input type="number" name="SupplierPhoneNo" class="form-control" min="0" value="<?php echo $SupplierPhoneNo;?>" required>
      </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    	<label><strong> FAX NUMBER </strong></label>
      <input type="number" name="SupplierFaxNo"class="form-control" min="0" value="<?php echo $SupplierFaxNo;?>" required>
      </div>
    <div class="form-group col-md-6">
    	<label><strong> PAYMENT TERMS </strong></label>
      <input type="text" name="PaymentTerms" class="form-control" min="0" value="<?php echo $PaymentTerms;?>" required>
    </div>

  </div>
  <button type="submit" name="submit" class="btn btn-info"> SAVE CHANGES </button>
</form>
</div>
</body>
</html>