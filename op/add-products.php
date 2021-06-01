<?php include ('../partials/menu.php'); ?>

<?php
		if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
		{
			echo $_SESSION['add']; //Display the Session Message if Set
			unset($_SESSION['add']); //Remove Session Message
		}
?>
<?php
	
	if (isset($_POST['submit']))
	{
		
		//1.Get the Data from form
                $ProductName=$_POST['ProductName'];
                $InStock=$_POST['InStock'];
                $UnitsInStock=$_POST['UnitsInStock'];
                $ProductUnitPurchasePrice=$_POST['ProductUnitPurchasePrice'];
                $ProductUnitSalePrice=$_POST['ProductUnitSalePrice'];
                $SupplierId=$_POST['SupplierId'];
		              

		//2.SQL Query to Save the data into database
		$sql = "INSERT INTO tblproducts SET
			ProductName='$ProductName',
			InStock='$InStock',
			UnitsInStock='$UnitsInStock',
			ProductUnitPurchasePrice='$ProductUnitPurchasePrice',
			ProductUnitSalePrice='$ProductUnitSalePrice',
			SupplierId='$SupplierId'

		";	

		//3.Executing Query and Saving Data into Database
		$res = mysqli_query($conn, $sql);

		//4. Check whether the (Query is Executed) data is inserter or not and display appropriate message
		if($res==TRUE)
		{
			$_SESSION['add'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Product Added Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect 
			header("location:".SITEURL.'main/products.php');
		}
		else
		{
			
			$_SESSION['add'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Add Product!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect 
			header("location:".SITEURL.'op/add-products.php');
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title> PRODUCTS </title>

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
			    	<label><strong>PRODUCT NAME</strong></label>
			     <input type="text" name="ProductName" placeholder="Product Name" class="form-control" required>
			    </div>
			    <div class="form-group col-md-3">
			    	<label><strong> IN STOCK </strong></label>
			      <input type="number" name="InStock" placeholder="InStock" class="form-control" min="0" required>
			    </div>
			  <div class="form-group col-md-3">
			  	<label> <strong> UNITS IN STOCK </strong></label>
			    <input type="number" name="UnitsInStock" placeholder="UnitsInStock" class="form-control" min="0" required>
			  </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			    	<label> <strong> PURCHASE PRICE </strong></label>
				<input type="number" name="ProductUnitPurchasePrice" placeholder="ProductUnitPurchasePrice" class="form-control" min="0" required>
			    </div>
			    <div class="form-group col-md-4">
			    	<label> <strong> SALE PRICE </strong> </label>
			      <input type="number" name="ProductUnitSalePrice" placeholder="ProductUnitSalePrice" class="form-control" min="0" required>
			      </div>
			    <div class="form-group col-md-4">
			    <label> <strong> SELECT SUPPLIER </strong> </label>
				    <select class="form-control" name="SupplierId" >
				      <option value=""> Select Supplier </option>
	<?php
	$sql = "SELECT * FROM tblsuppliers";
	$res =mysqli_query($conn, $sql);
	while($row =mysqli_fetch_assoc($res))
	{
	?>
	<option value="<?php echo $row['SupplierID'];?>"><?php echo $row['SupplierName'];?></option>
	<?php	
	}
	?>
</select>  
</div>
</div>
<button type="submit" name="submit" class="btn btn-info"> <i class="fas fa-plus"> NEW PRODUCT </i> </button>
</form>
</div>
