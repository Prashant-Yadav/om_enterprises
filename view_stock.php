<!-- Including files for DB connection and Session Control -->
<?php
    include 'includes/login/core.inc.php';
    include 'includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<!DOCTYPE html>
<html lang="en">

  <?php
    if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session
      
      

  ?>

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>View Stock</title>

      <!-- Bootstrap core css -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="assets/css/sb-admin.css" rel="stylesheet">

      <!-- Morris Charts CSS -->
      <link href="assets/css/plugins/morris.css" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <!-- Custom styles for this template -->
      <link href="assets/css/justified-nav.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
    <!-- code to include navigation menu-->
      <div id="wrapper">
      
        <?php require 'includes/menu_bar.inc.php';?>  
      
        <!-- div for main pages-->
        <div id="page-wrapper">

        <div>
          <h1>View stock</h1>
        </div>

          <form method="POST" action="#" class="form-inline">
            <label> Brand Name </label> 
            <select class="form-control" name="brandName" id="brandName">
              
              <?php 
                $selectBrandsQuery = mysqli_query($con, "SELECT DISTINCT `brand_name` FROM `brand`");
                while ($brandRow = mysqli_fetch_assoc($selectBrandsQuery)) {
                  # code...
                  $brandNameValue = $brandRow['brand_name'];
                  echo "<option value='".$brandNameValue."'>".$brandNameValue."</option><br>";
                }
               ?>

            </select> 
            <br>
            <input type="submit" class="btn btn-default" label="Submit" value="Submit" id="submitView" name="submitView"><br>
          </form>

          <br>
            
          <?php 
            if (isset($_POST['submitView'])) {
              
              if (!empty($_POST['brandName'])) {
                # select brand...
                $brandNameSelected = $_POST['brandName'];
                if ($queryRun = mysqli_query($con, "SELECT * FROM `brand` WHERE `brand_name` = '$brandNameSelected'")) {
                  # select details of brand...
                  echo "Stock details of <strong>".$brandNameSelected."</strong><br>";
                  echo "<table class='table table-hover table-bordered'>
                          <tbody>
                            <tr>
                              <th>Dimension</th>
                              <th>Thickness</th>
                              <th>Available</th>
                            </tr>";
                  while ($queryRow = mysqli_fetch_assoc($queryRun)) {
                    # code...
                      echo "<tr>
                              <td>".$queryRow['dimension']."</td>
                              <td>".$queryRow['thickness']."</td>
                              <td>".$queryRow['stock']."</td>
                            </tr>";
                  }
                  echo "  </tbody>
                        </table>";
                }
                else
                  echo "Query Unsuccessful.";

              }
            }
           ?>

        </div>  <!-- /#page-wrapper-->
      
      </div> <!-- /#wrapper -->
      

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

      <!-- jQuery -->
      <script src="assets/js/jquery.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="assets/js/bootstrap.min.js"></script>

      <!-- Morris Charts JavaScript -->
      <script src="../assets/js/plugins/morris/raphael.min.js"></script>
      <script src="../assets/js/plugins/morris/morris.min.js"></script>
      <script src="../assets/js/plugins/morris/morris-data.js"></script>
    
  <?php
    } #End of LoggedIn function
    else{
        #redired to loginform if not loggedIn
        include 'includes/login/loginform.inc.php' ;
    }
  ?>

  </body>
</html>