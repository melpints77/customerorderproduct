<?php include ('../partials/menu.php'); ?>

<?php
				$ProductID=$_GET['ProductID'];

				//2. Create SQL Query to Get the Details
				$sql= "SELECT * FROM tblproducts WHERE ProductID=$ProductID";

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

						$ProductID=$row['ProductID'];
		                $ProductName=$row['ProductName'];
		                $InStock=$row['InStock'];
		                $UnitsInStock=$row['UnitsInStock'];
		                $ProductUnitPurchasePrice=$row['ProductUnitPurchasePrice'];
		                $ProductUnitSalePrice=$row['ProductUnitSalePrice'];
		                $SupplierId=$row['SupplierId'];
		                //Display the Values in our Table
                
					}
					else
					{
						//Redirect to Manage Admin Page
						header('location:'.SITEURL.'main/products.php');
					}
				}

			?>

<?php
	if(isset($_POST['submit']))
	{
                $ProductName=$_POST['ProductName'];
                $InStock=$_POST['InStock'];
                $UnitsInStock=$_POST['UnitsInStock'];
                $ProductUnitPurchasePrice=$_POST['ProductUnitPurchasePrice'];
                $ProductUnitSalePrice=$_POST['ProductUnitSalePrice'];
                $SupplierId=$_POST['SupplierId'];
		                //Display the Values in our Table

		//Create a SQL Query
		$sql = "UPDATE tblproducts SET
			ProductName='$ProductName',
			InStock='$InStock',
			UnitsInStock='$UnitsInStock',
			ProductUnitPurchasePrice='$ProductUnitPurchasePrice',
			ProductUnitSalePrice='$ProductUnitSalePrice',
			SupplierId='$SupplierId'
			where ProductID = '$ProductID'
		";

		//Execute the Query
		$res=mysqli_query($conn, $sql);

		//Check whether the query executed successfully or not
		if($res==TRUE)
		{
			//Query executed
			$_SESSION['update'] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
													Product Updated Successfully!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect 
			header('location:'.SITEURL.'main/products.php');
		}
		else
		{
			$_SESSION['update'] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
													Failed to Update Product!
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button></div>";
			//Redirect
			header('location:'.SITEURL.'main/product.php');
		}

	}

	?>

<!DOCTYPE html>
<html>
<head>
	<title> PRODUCT </title>

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
			     <input type="text" name="ProductName" class="form-control" value="<?php echo $ProductName;?>">
			    </div>
			    <div class="form-group col-md-3">
			    	<label><strong> IN STOCK </strong></label>
			      <input type="number" name="InStock" class="form-control" min="0" value="<?php echo $InStock;?>">
			    </div>
			  <div class="form-group col-md-3">
			  	<label> <strong> UNITS IN STOCK </strong></label>
			    <input type="number" name="UnitsInStock" class="form-control" min="0" value="<?php echo $UnitsInStock;?>">
			  </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			    	<label> <strong> PURCHASE PRICE </strong></label>
				<input type="number" name="ProductUnitPurchasePrice" class="form-control" min="0" value="<?php echo $ProductUnitPurchasePrice;?>">
			    </div>
			    <div class="form-group col-md-4">
			    	<label> <strong> SALE PRICE </strong> </label>
			      <input type="number" name="ProductUnitSalePrice" class="form-control" min="0" value="<?php echo $ProductUnitSalePrice;?>">
			      </div>
			    <div class="form-group col-md-4">
			    <label> <strong> SELECT SUPPLIER </strong> </label>
				    <select class="form-control" name="SupplierId" >
				      <option value=""> Select Supplier </option>
		<?php
		$sql = "SELECT * FROM tblsuppliers order by SupplierID DESC";
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
		<button type="submit" name="submit" class="btn btn-info"> SAVE CHANGES </button>
</form>
</div>

</body>
</html>