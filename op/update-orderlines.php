<?php include ('../partials/menu.php'); ?>


<?php
       if(isset($_SESSION['update'])) 
      {
        echo $_SESSION['update']; 
        unset($_SESSION['update']);
      }
  ?>

<?php
date_default_timezone_set('Asia/Manila');

  if (isset($_POST['submit']))
  {

    //1.Get the Data from form
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
    $sql = "UPDATE tbllink_orderproduct SET
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
      
      $_SESSION['update'] = "<div></div>";
      header("location:".SITEURL.'op/update-orderlines.php');
    }
    else
    {
      
      $_SESSION['update'] = "<div></div>";
      header("location:".SITEURL.'main/orderlines.php');
    }

  }

?>
<!DOCTYPE html>
<html>
<head>
  <title> ORDER DETAILS </title>

  <!-- For bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- font awesome --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <!-- for css -->
    <link rel="stylesheet" type="text/css" href="../style/main.css">

    <style rel='stylesheet' type='text/css'>

div {

}
button#bottom-right {
bottom: 0;
right: 0;
padding: 5px;
position: fixed;
}
</style>
</head>
<body>
<center>

 <button name="top"></button>
    <div class="container mt-5 mb-5">


        <div class="row mt-3">
          <div class="col-md-12">
          <h4 class="font-weight-bold text-white text-center">ORDER DETAILS</h4>
          </div>
        </div>

        <?php
        //Query to Get All Admin
        $sql = "SELECT concat(CustomerFirstName, ' ', CustomerLastName) as 'CustomerName', od.OrderId, p.ProductName, s.SupplierName, o.OrderTotalProductNo, (o.OrderTotalProductNo * p.ProductUnitSalePrice) as 'ProductSaleCost', o.DateOrderPlaced, o.TimeOrderPlaced, o.AnyAdditionalInfo, od.ArrangedDeliveryDate, od.ArrangedDeliveryTime FROM tblcustomers c inner join tblorders o on c.CustomerId = o.CustomerId inner join tbllink_orderproduct od on o.OrderId = od.OrderId inner join tblproducts p on od.ProductId = p.ProductId inner join tblsuppliers s on p.SupplierId = s.SupplierId order by od.OrderId";
    
                    //Execute the Query
        $res =mysqli_query($conn, $sql);

         if (mysqli_num_rows($res) > 0) {
          while ($rows = mysqli_fetch_assoc($res)) {

                          ?>

        <!--Horizontal card-->
        <div class="card mt-5" style="width: 300px; text-align: center;">
          <div class="row">
            <div class="col ml-4 mt-4 mb-4 pr-5">

              <p class="font-weight-bold mb-1 mt-3">Order Id: </p>
              <p><?php echo $rows['OrderId']; ?></p>

              <p class="font-weight-bold mb-1 mt-3">CUSTOMER NAME: </p>
              <p><?php echo $rows['CustomerName']; ?></p>

              <p class="font-weight-bold mb-1 mt-3"> PRODUCT NAME: </p>
              <p><?php echo $rows['ProductName']; ?></p>

              <p class="font-weight-bold mb-1 mt-3"> SUPPLIER NAME:</p>
              <p><?php echo $rows['SupplierName']; ?></p>

              
              <p class="font-weight-bold mb-1 mt-3">ORDER TOTAL PRODUCT NO:</p>
              <p><?php echo $rows['OrderTotalProductNo']; ?></p>

              
              <p class="font-weight-bold mb-1 mt-3">PRODUCT SALE COST:</p>
              <p><?php echo $rows['ProductSaleCost']; ?></p>

              <p class="font-weight-bold mb-1 mt-3">ANY ADDITIONAL INFO:</p>
              <p><?php echo $rows['AnyAdditionalInfo']; ?></p>
             
              <p class="font-weight-bold mb-1 mt-3">DATE/TIME ORDER PLACED:</p>
              <p><?php echo $rows['DateOrderPlaced']; ?> <?php echo $rows['TimeOrderPlaced']; ?></p>
             
              <p class="font-weight-bold mb-1 mt-3">DATE/TIME ARRANGED DELIVERY:</p>
              <p><?php echo $rows['ArrangedDeliveryDate']; ?> <?php echo $rows['ArrangedDeliveryTime']; ?></p>
             
              <p class="font-weight-bold mb-1 mt-3">WILL DISPATCH: </p>
              <p> <?php echo date('Y-m-d', strtotime(' + 2 days')); ?> <?php echo $rows['TimeOrderPlaced']; ?></p>
  
              <p class="font-weight-bold mb-1 mt-3">ACTUAL DELIVERY DATE/TIME :</p>
              <p> <?php echo date("Y-m-d : H:i:s", time()); ?></p>
    
              <a class="btn btn-danger" href="<?php echo SITEURL; ?>op/delete-orderlines.php?OrderId=<?php echo $rows['OrderId']; ?>">DELETE</a>  
       </div>
       </div>
       </div>
        <?php
          }
        }
            else
            {
              //We do not have data in database
              echo "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                          No Record!
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button></div>";
            }
      ?>
    </div>
    </div>
    <button class="btn btn-info" id='bottom-right'> <a href="#top" style="text-decoration: none; color: white;">Back to top of page </a></button>

    </div>
</center>
</body>
</html>