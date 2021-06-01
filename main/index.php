<?php include ('../partials/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> HOMEPAGE </title>

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
  <div class="card">
    <div class="imgBx">
      <img src="../images/user.png">
    </div>
    <div class="content">
      <h2>PRODUCT</h2>
      <p>THIS IS FOR SUPPLIER AND PRODUCT</p>
      <a href="../main/suppliers.php"><button class="btn btn-outline-info">SUPPLIER</button></a>
      <a href="../main/products.php"><button class="btn btn-outline-info">PRODUCT</button></a>
    </div>
  </div>
   <div class="card">
    <div class="imgBx">
      <img src="../images/transaction.png">
    </div>
    <div class="content">
      <h2>TRANSACTION</h2>
      <p>THIS IS FOR CUSTOMER AND ORDER DETAILS</p>
       <a href="../main/customers.php"><button class="btn btn-outline-info">CUSTOMER</button></a>
      <a href="../op/add-orders.php"><button class="btn btn-outline-info">ORDER</button></a>
    </div>
  </div>
   <div class="card">
    <div class="imgBx">
      <img src="../images/file.png">
    </div>
    <div class="content">
      <h2>DETAILS</h2>
      <a href="../main/report.php"><button class="btn btn-outline-info">ADDITIONAL INFO</button></a>
    </div>
  </div>
</div>
  
</body>
</html>

