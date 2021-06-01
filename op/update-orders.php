<?php include ('../partials/menu.php'); ?>

			<?php
				/
				$OrderID=$_GET['OrderID'];

				//2. Create SQL Query to Get the Details
				$sql= "SELECT * FROM tblorders WHERE OrderID=$OrderID";

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
		                $CustomerId=$row['CustomerId'];
		                $DateOrderPlaced=$row['DateOrderPlaced'];
		                $TimeOrderPlaced=$row['TimeOrderPlaced'];
		                $OrderTotalProductNo=$row['OrderTotalProductNo'];
		                $OrderCompleted=$row['OrderCompleted'];
		                $DateOrderCompleted=$row['DateOrderCompleted'];
		                $AnyAdditionalInfo=$row['AnyAdditionalInfo'];
                
					}
					else
					{
						//Redirect
						header('location:'.SITEURL.'main/orders.php');
					}
				}

			?>
			
	<?php
	date_default_timezone_set('Asia/Manila');
	
	//Check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
                $CustomerId=$_POST['CustomerId'];
                $DateOrderPlaced=date('Y/m/d');
                $TimeOrderPlaced=date('h:i:sa');
                $OrderTotalProductNo=$_POST['OrderTotalProductNo'];
                $OrderCompleted=$_POST['OrderCompleted'];
                $DateOrderCompleted=date('Y/m/d');
                $AnyAdditionalInfo=$_POST['AnyAdditionalInfo'];

		//Create a SQL Query
		$sql = "UPDATE tblorders SET
			CustomerId = '$CustomerId',
			DateOrderPlaced='$DateOrderPlaced',
			TimeOrderPlaced='$TimeOrderPlaced',
			OrderTotalProductNo='$OrderTotalProductNo',
			OrderCompleted='$OrderCompleted',
			DateOrderCompleted='$DateOrderCompleted',
			AnyAdditionalInfo='$AnyAdditionalInfo'
			where OrderID = '$OrderID'
		";

		//Execute the Query
		$res=mysqli_query($conn, $sql);

		//Check whether the query executed successfully or not
		if($res==TRUE)
		{
			//Query executed 
			$_SESSION['update'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Order Updated Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect
			header('location:'.SITEURL.'main/orders.php');
		}
		else
		{
			$_SESSION['update'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Update Order!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect to manage
			header('location:'.SITEURL.'main/orders.php');
		}

	}

	?>

<!DOCTYPE html>
<html>
<head>
	<title> ORDER </title>

	<!-- For bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- font awesome --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <!-- for css -->
    <link rel="stylesheet" type="text/css" href="../style/css.css">

</head>
<body>

<div class="container">

<form action="" method="POST">
	 <div class="form-row">
    <div class="form-group col-md-4">
  	<label><strong> DATE ORDER PLACED </strong></label>
    <input type="date" name="DateOrderPlaced" class="form-control" value="<?php echo $DateOrderPlaced;?>" readonly>
  </div>
  <div class="form-group col-md-4">
  	<label><strong> TIME ORDER PLACED </strong></label>
    <input type="time" name="TimeOrderPlaced" class="form-control" value="<?php echo $TimeOrderPlaced;?>" readonly>
  </div>
  <div class="form-group col-md-4">
  	<label><strong> DATE ORDER COMPLETED </strong></label>
    <input type="date" name="DateOrderCompleted" class="form-control"value="<?php echo $DateOrderCompleted;?>" readonly>
  </div>
</div>
	<div class="form-row">
		<div class="form-group col-md-6">
    	<label> <strong> CUSTOMER </strong> </label>
				    <select class="form-control" name="CustomerId" required>
				      <option value=""> Select Customer </option>
	<?php
	$sql = "SELECT * FROM tblcustomers";
	$res =mysqli_query($conn, $sql);
	while($row =mysqli_fetch_assoc($res))
	{
	?>
	<option value="<?php echo $row['CustomerID'];?>"><?php echo $row['CustomerLastName'];?> <?php echo $row['CustomerFirstName'];?></option>
	<?php	
	}
	?>
</select>
</div>
    <div class="form-group col-md-6">
    	<label><strong> ORDERTOTALPRODUCTNO</strong></label>
      <input type="number" name="OrderTotalProductNo" placeholder="OrderTotalProductNo" min="0" class="form-control" value="<?php echo $OrderTotalProductNo;?>" required>
    </div>
  </div>
 <div class="form-row">
    <div class="form-group col-md-6">
  	<label><strong> ORDERCOMPELETED </strong></label>
    <input type="text" name="OrderCompleted" placeholder="OrderCompleted" class="form-control" value="<?php echo $OrderCompleted;?>" required>
  </div>
<div class="form-group col-md-6">
  	<label><strong> ANY ADDITIONAL INFO </strong></label>
    <input type="text" name="AnyAdditionalInfo" placeholder="AnyAdditionalInfo" class="form-control" value="<?php echo $AnyAdditionalInfo;?>" required>
  </div>
</div>
  <button type="submit" name="submit" class="btn btn-outline-secondary"> SAVE CHANGES </button>
</form>
</div>	
</body>
</html>