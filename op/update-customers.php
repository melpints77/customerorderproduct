<?php include ('../partials/menu.php'); ?>

<?php
				
				$CustomerID=$_GET['CustomerID'];

				//2. Create SQL Query to Get the Details
				$sql= "SELECT * FROM tblcustomers WHERE CustomerID=$CustomerID";

				//Execute the Query
				$res=mysqli_query($conn, $sql);

				//Check whether the query is executed or not
				if($res==TRUE)
				{
					//Check whether the data is available or not
					$count = mysqli_num_rows($res);
					//Check whether we have admin data or not
					if($count==1)
					{
						
						$row=mysqli_fetch_assoc($res);

		                $CustomerFirstName=$row['CustomerFirstName'];
		                $CustomerLastName=$row['CustomerLastName'];
		                $CustomerAddressStreet=$row['CustomerAddressStreet'];
		                $CustomerAddressCity=$row['CustomerAddressCity'];
		                $CustomerAddressCountry=$row['CustomerAddressCountry'];
		                $CustomerAddressPostCode=$row['CustomerAddressPostCode'];
		                $CustomerContactPhoneNo=$row['CustomerContactPhoneNo'];
		}
					else
					{
						//Redirect 
						header('location:'.SITEURL.'main/customers.php');
					}
				}

			?>

<?php

//Check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
	//Get all the values from form to update
			$CustomerFirstName=$_POST['CustomerFirstName'];
			$CustomerLastName=$_POST['CustomerLastName'];
			$CustomerAddressStreet=$_POST['CustomerAddressStreet'];
			$CustomerAddressCity=$_POST['CustomerAddressCity'];
			$CustomerAddressCountry=$_POST['CustomerAddressCountry'];
			$CustomerAddressPostCode=$_POST['CustomerAddressPostCode'];
			$CustomerContactPhoneNo=$_POST['CustomerContactPhoneNo'];

	//Create a SQL Query
	$sql= "UPDATE tblcustomers SET
		CustomerFirstName='$CustomerFirstName',
		CustomerLastName='$CustomerLastName',
		CustomerAddressStreet='$CustomerAddressStreet',
		CustomerAddressCity='$CustomerAddressCity',
		CustomerAddressCountry='$CustomerAddressCountry',
		CustomerAddressPostCode='$CustomerAddressPostCode',
		CustomerContactPhoneNo='$CustomerContactPhoneNo'
		where CustomerID = '$CustomerID'
	";

	//Execute the Query
	$res=mysqli_query($conn, $sql);

	//Check whether the query executed successfully or not
	if($res==TRUE)
	{
		//Query executed
		$_SESSION['update'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
								Customer Updated Successfully!
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
								</button></div>";
		//Redirect
		header('location:'.SITEURL.'main/customers.php');
	}
	else
	{
		$_SESSION['update'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
								Failed to Update Customer!
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
								</button></div>";
		//Redirect 
		header('location:'.SITEURL.'main/customers.php');
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title> CUSTOMERS </title>

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
    <div class="form-group col-md-6">
    	<label><strong>FIRST NAME</strong></label>
      <input type="text" name="CustomerFirstName" class="form-control" value="<?php echo $CustomerFirstName;?>">
    </div>
    <div class="form-group col-md-6">
    	<label><strong>LAST NAME</strong></label>
      <input type="text" name="CustomerLastName" class="form-control" value="<?php echo $CustomerLastName;?>">
    </div>
  </div>
  <div class="form-group">
  	<label><strong> STREET</strong></label>
    <input type="text" name="CustomerAddressStreet" class="form-control" value="<?php echo $CustomerAddressStreet;?>">
  </div>
  <div class="form-group">
  	<label><strong>CITY</strong></label>
   	<input type="text" name="CustomerAddressCity" class="form-control" value="<?php echo $CustomerAddressCity;?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    	<label><strong>PHONE NUMBER </strong></label>
      <input type="number" name="CustomerContactPhoneNo" class="form-control" min="0" value="<?php echo $CustomerContactPhoneNo;?>">
    </div>
    <div class="form-group col-md-4">
    	<label><strong>COUNTRY</strong></label>
      <input type="text" name="CustomerAddressCountry" class="form-control" value="<?php echo $CustomerAddressCountry;?>">
      </div>
    <div class="form-group col-md-2">
    	<label><strong>POST CODE</strong></label>
      <input type="text" name="CustomerAddressPostCode" class="form-control" value="<?php echo $CustomerAddressPostCode;?>">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-info"> SAVE CHANGES </button>
</form>
</div>
</body>
</html>