<?php include ('../partials/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> TRANSACTION </title>

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

<div class="row">
  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"> CUSTOMERS </h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="../main/customers.php" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title"> ORDERS </h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="../main/orders.php" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
</div>
</div>
<br>
  <div class="row">
    <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
         <h5 class="card-title"> ORDERFORM </h5>
        <p class="card-text"> customer can add order </p>
        <a href="../op/add-orderlines.php" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>