<?php include ('../partials/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> REPORTS </title>

	<!-- For bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- font awesome --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <!-- for css -->
    <link rel="stylesheet" type="text/css" href="../style/main.css">

</head>
<body>
<div class="container">

<br>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"> SUPPLIER AND PRODUCT </h5>
        <p class="card-text">Supplier supplies a particular product.</p>
        <a href="../op/supplier-product.php" class="btn btn-info"> <i class="fas fa-clone"> MORE </i> </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
         <h5 class="card-title"> MARK-UP</h5>
        <p class="card-text"> Mark-up on a certain product.</p>
        <a href="../op/mark-up.php" class="btn btn-info"> <i class="fas fa-clone"> MORE </i> </a>
      </div>
    </div>
  </div>
</div>
<br>
<center>
    <div class="card text-center" style="width: 400px;">
      <div class="card-body">
         <h5 class="card-title"> PRODUCT IN STOCK </h5>
        <p class="card-text"> Amount of the certain product in stock</p>
        <a href="../op/product-instock.php" class="btn btn-info"> <i class="fas fa-clone"> MORE </i> </a>
      </center>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>





