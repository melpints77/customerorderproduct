<?php include ('../partials/menu.php'); ?>

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
    <link rel="stylesheet" type="text/css" href="../style/main.css">

</head>
<body>

<?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add']; 
        unset($_SESSION['add']); 
      }
      if(isset($_SESSION['update'])) 
      {
        echo $_SESSION['update']; 
        unset($_SESSION['update']);
      }
      if(isset($_SESSION['delete']))
      {
        echo $_SESSION['delete']; 
        unset($_SESSION['delete']); 
      }
    ?>

<div class="container">

    <a href="../op/add-products.php"> <button class="btn btn-light"><span> <i class="fas fa-plus"> CREATE </i></span></button></a> 
    <a href="../op/printproduct.php"> <button class="btn btn-light"><span> <i class="fas fa-print"> PRINT  </i></span></button></a> 
    <br>
    <br>
    <table class="table table-hover text-center">
    <thead class="thead-dark text-center">
        <th>#</th>
        <th>ProductName</th>
        <th>InStock</th>
        <th>UnitsInStock</th>
        <th>ProductUnitPurchasePrice</th>
        <th>ProductUnitSalePrice</th>
        <th>SupplierId</th>
        <th>Actions</th>
      </tr>
      </thead>

      <?php
        
        $sql = "SELECT * FROM tblproducts order by ProductID DESC";
        //Execute the Query
        $res =mysqli_query($conn, $sql);

        //Check whether the Query is Executed of Not
        if($res==TRUE)
        {
          //Count Rows to Check whether we have data in database or not
          $count = mysqli_num_rows($res); //Function to get all the rows in database

         //Create a Variable and Assign the value
          $sn=1;
          //Check the num of rows
          if($count>0)
            {
              //We have data in database
              while($row =mysqli_fetch_assoc($res))
              {
                //Using while loop to get all the data from database.
                //And while loop will run as long as we have data in database

                //Get individual data
                ?>
                <tr class="table-light">
                  <td><?php echo $sn++;?></td>
                  <td><?php echo $row['ProductName']; ?></td>
                  <td><?php echo $row['InStock']; ?></td>
                  <td><?php echo $row['UnitsInStock']; ?></td>
                  <td><?php echo $row['ProductUnitPurchasePrice']; ?></td>
                  <td><?php echo $row['ProductUnitSalePrice'] ;?></td>
                  <td><?php echo $row['SupplierId']; ?></td>
                  <td>
                    <a href="<?php echo SITEURL; ?>op/update-products.php?ProductID=<?php echo $row['ProductID']; ?>"><i class="fas fa-edit" style="color: green;"></i></a>
                    <a href="<?php echo SITEURL; ?>op/delete-products.php?ProductID=<?php echo $row['ProductID']; ?>"><i class="fas fa-trash-alt" style="color: red;"></i></a>
                  </td>
                </tr>

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
          }

      ?>

      </table>
            </div>
            </div>
            </div>
</body>
</html>

