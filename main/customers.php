<?php include ('../partials/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> CUSTOMER </title>

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

    <a href="../op/add-customers.php"> <button class="btn btn-light"><span> <i class="fas fa-plus"> CREATE </i></span></button></a> 
    <a href="../op/printcustomer.php"> <button class="btn btn-light"><span> <i class="fas fa-print"> PRINT  </i></span></button></a> 
    <br>
    <br>
    <table class="table table-hover text-center">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Street</th>
        <th>City</th>
        <th>Country</th>
        <th>PostCode</th>
        <th>PhoneNo</th>
        <th>Actions</th>
      </tr>
      </thead>

      <?php
        
        $sql = "SELECT * FROM tblcustomers order by CustomerID DESC";
        //Execute the Query
        $res =mysqli_query($conn, $sql);

        //Check whether the Query is Executed of Not
        if($res==TRUE)
        {
          //Count Rows to Check whether we have data in database or not
          $count = mysqli_num_rows($res); //Function to get all the rows in database

          $sn=1; //Create a Variable and Assign the value

          //Check the num of rows
          if($count>0)
            {
              //We have data in database
              while($rows =mysqli_fetch_assoc($res))
              {
                //Using while loop to get all the data from database.
                //And while loop will run as long as we have data in database

                //Get individual data
                $CustomerID=$rows['CustomerID'];
                $CustomerFirstName=$rows['CustomerFirstName'];
                $CustomerLastName=$rows['CustomerLastName'];
                $CustomerAddressStreet=$rows['CustomerAddressStreet'];
                $CustomerAddressCity=$rows['CustomerAddressCity'];
                $CustomerAddressCountry=$rows['CustomerAddressCountry'];
                $CustomerAddressPostCode=$rows['CustomerAddressPostCode'];
                $CustomerContactPhoneNo=$rows['CustomerContactPhoneNo'];
                
                //Display the Values in our Table
                ?>
                <tr class="table-light">
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $CustomerFirstName; ?></td>
                  <td><?php echo $CustomerLastName; ?></td>
                  <td><?php echo $CustomerAddressStreet; ?></td>
                  <td><?php echo $CustomerAddressCity; ?></td>
                  <td><?php echo $CustomerAddressCountry; ?></td>
                  <td><?php echo $CustomerAddressPostCode; ?></td>
                  <td><?php echo $CustomerContactPhoneNo; ?></td>
                  <td>
                  <a href="<?php echo SITEURL; ?>op/update-customers.php?CustomerID=<?php echo $CustomerID; ?>"><i class="fas fa-edit" style="color: green;"></i></a>
                  <a href="<?php echo SITEURL; ?>op/delete-customers.php?CustomerID=<?php echo $CustomerID; ?>"><i class="fas fa-trash-alt" style="color: red;"></i></a>
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

