<?php include ('../partials/menu.php'); ?>

<?php
			if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
			{
				echo $_SESSION['add']; //Display the Session Message if Set
				unset($_SESSION['add']); //Remove Session Message
			}
		?>

<?php
	date_default_timezone_set('Asia/Manila');
	
	if (isset($_POST['submit']))
	{
                $CustomerId=$_POST['CustomerId'];
                $DateOrderPlaced=date('Y/m/d');
                $TimeOrderPlaced=date('h:i:sa');
                $OrderTotalProductNo=$_POST['OrderTotalProductNo'];
                $OrderCompleted=$_POST['OrderCompleted'];
                $DateOrderCompleted=date('Y/m/d');
                $AnyAdditionalInfo=$_POST['AnyAdditionalInfo'];

		//2.SQL Query to Save the data into database
		$sql = "INSERT INTO tblorders SET
			CustomerId = '$CustomerId',
			DateOrderPlaced='$DateOrderPlaced',
			TimeOrderPlaced='$TimeOrderPlaced',
			OrderTotalProductNo='$OrderTotalProductNo',
			OrderCompleted='$OrderCompleted',
			DateOrderCompleted='$DateOrderCompleted',
			AnyAdditionalInfo='$AnyAdditionalInfo'
		";

		//3.Executing Query and Saving Data into Database
		$res = mysqli_query($conn, $sql);

		//4. Check whether the (Query is Executed) data is inserter or not and display appropriate message
		if($res==TRUE)
		{
			$_SESSION['add'] = "<div class='alert alert-primary alert-dismissible fade show text-center' role='alert'>
													Continue Answering.
													</div>";
			header("location:".SITEURL.'op/add-orderlines.php');
		}
		else
		{	
			$_SESSION['add'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed please try again!
													</div>";
			header("location:".SITEURL.'op/add-orders.php');
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
    <link rel="stylesheet" type="text/css" href="../style/op.css">

</head>
<body>

<div class="container">
<br>
<br>
<br>
<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-4">
    	<label> <strong> CUSTOMER </strong> </label>
				    <select class="form-control" name="CustomerId" required>
				      <option value=""> Select Customer </option>
	<?php
	$sql = "SELECT * FROM tblcustomers";
	$res =mysqli_query($conn, $sql);
	while($row =mysqli_fetch_assoc($res))
	{
	?>
	<option value="<?php echo $row['CustomerID'];?>"><?php echo $row['CustomerFirstName'];?> <?php echo $row['CustomerLastName'];?></option>
	<?php	
	}
	?>
</select>
</div>
<div class="form-group col-md-4">
  	<label><strong> ORDER TOTAL PRODUCT NUMBER </strong></label>
    <input type="number" name="OrderTotalProductNo" placeholder="OrderTotalProductNumber" min="0" class="form-control" required>
</div>
<div class="form-group col-md-4">
  	<label><strong> ANY ADDITIONAL INFO </strong></label>
    <input type="text" name="AnyAdditionalInfo" placeholder="AnyAdditionalInfo" class="form-control" required>
  </div>
<button type="submit" name="submit" class="btn btn-info"> NEXT </button>
</div>

</form>
</div>
</body>
</html>