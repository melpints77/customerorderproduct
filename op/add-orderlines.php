<?php include ('../partials/menu.php'); ?>

<?php
			if(isset($_SESSION['add'])) 
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']); 
			}
		?>

<?php
date_default_timezone_set('Asia/Manila');

	if (isset($_POST['submit']))
	{

		
								$OrderId = $_POST['OrderId'];
								$ProductId = $_POST['ProductId'];
                $ProductQuantity=$_POST['ProductQuantity'];
                $TotalProductSaleCost=$_POST['TotalProductSaleCost'];
                $ArrangedDeliveryDate=$_POST['ArrangedDeliveryDate'];
                $ArrangedDeliveryTime=$_POST['ArrangedDeliveryTime'];
                $ProductDelivered=$_POST['ProductDelivered'];
                $ActualDeliveryDate=date('Y/m/d');
                $ActualDeliveryTime= date('h:i:sa');
           
		            //Display the Values in our Table

		//2.SQL Query to Save the data into database
		$sql = "INSERT INTO tbllink_orderproduct SET
			OrderId='$OrderId',
			ProductId='$ProductId',
			ProductQuantity='$ProductQuantity',
			TotalProductSaleCost='$TotalProductSaleCost',
			ArrangedDeliveryDate='$ArrangedDeliveryDate',
			ArrangedDeliveryTime='$ArrangedDeliveryTime',
			ProductDelivered='$ProductDelivered',
			ActualDeliveryDate='$ActualDeliveryDate',
			ActualDeliveryTime='$ActualDeliveryTime'
		";

		//3.Executing Query and Saving Data into Database
		$res = mysqli_query($conn, $sql);

		//4. Check whether the (Query is Executed) data is inserter or not and display appropriate message
		if($res==TRUE)
		{
			
			$_SESSION['add'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Received Order!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			header("location:".SITEURL.'main/orderlines.php');
		}
		else
		{
			
			$_SESSION['add'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Received Order!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			header("location:".SITEURL.'op/add-orderlines.php');
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title> ORDER FORM </title>

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

<form action="" method="POST">
			
  <div class="form-row">
    <div class="form-group col-md-4">
    	<label> <strong> ORDERID </strong> </label>
				    <select class="form-control" name="OrderId" required>
				      <option value=""> OrderId </option>
	<?php
	$sql = "SELECT * FROM tblorders order by OrderID DESC LIMIT 1";
	$res =mysqli_query($conn, $sql);
	while($row =mysqli_fetch_assoc($res))
	{
	?>
	<option value="<?php echo $row['OrderID'];?>"><?php echo $row['OrderID'];?></option>
	<?php	
	}
	?>
</select>
</div>
 <div class="form-group col-md-4">
    	<label> <strong> PRODUCT </strong> </label>
				    <select class="form-control" name="ProductId" required>
				      <option value=""> Select Product </option>
	<?php
	$sql = "SELECT * FROM tblproducts";
	$res =mysqli_query($conn, $sql);
	while($row =mysqli_fetch_assoc($res))
	{
	?>
	<option value="<?php echo $row['ProductID'];?>"><?php echo $row['ProductName'];?></option>
	<?php	
	}
	?>
</select>
</div>
<div class="form-group col-md-4">
<label> <strong> PRODUCTS QUANTITY </strong> </label>
<?php
	$sql = "SELECT sum(InStock + UnitsInStock) as 'Quantity' FROM tblproducts";
	$res =mysqli_query($conn, $sql);
	while($row =mysqli_fetch_assoc($res))
	{
	?>
	<input name="ProductQuantity" class="form-control" value="<?php echo $row['Quantity']; ?>" readonly>
	<?php	
	}
	?>
</div>
</div>
 <div class="form-row">
 <div class="form-group col-md-6">
  	<label><strong> ARRANGED DELIVERY DATE </strong></label>
    <input type="date" name="ArrangedDeliveryDate" placeholder="ArrangedDeliveryDate" class="form-control" required>
  </div>
  <div class="form-group col-md-6">
  	<label><strong> ARRANGED DELIVERY TIME </strong></label>
    <input type="time" name="ArrangedDeliveryTime" placeholder="ArrangedDeliveryTime" class="form-control" required>
  </div>
</div>
  <button type="submit" name="submit" class="btn btn-info"> <i class="fas fa-plus"> NEW ORDER </i> </button>
</form>
</div>
</body>
</html>