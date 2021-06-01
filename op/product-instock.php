<?php include ('../partials/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title> PRODUCT IN STOCK</title>

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
      <?php
       
        $sql = "SELECT count(ProductId) AS 'Certain Product' FROM tblproducts where InStock is not null";
        //Execute the Query
        $res =mysqli_query($conn, $sql);

        //Check whether the Query is Executed of Not
        if($res==TRUE)
        {
          //Count Rows to Check whether we have data in database or not
          $count = mysqli_num_rows($res); //Function to get all the rows in database

          //Check the num of rows
          if($count>0)
            {
              //We have data in database
              while($rows =mysqli_fetch_assoc($res))
              {  
                ?>
                    <div class="card text-center">
                      <div class="card-body">
                         <h5 class="card-title"> Certain Product In Stock </h5>
                        <p class="card-text"> <?php echo $rows['Certain Product']; ?> </p>
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
        }

      ?>

</body>
</html>

