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
      
      $itemDimension = NULL;
      $itemQuantity = NULL;
      $itemThickness = NULL;
      $brandName = NULL;
      # $brandNameList = array('star M.R.', 'star W.P.', 'ultra marine M.R.', 'ultra marine W.P.', 'akshar', 'woodbond', 'kingfisher');
      # $brandDimensionList = array('8x4', '8x3', '7x4', '7x3', '6x4', '6x3');
      # $brandThicknessLIst = array('4mm', '6mm', '8mm', '12mm', '15mm', '16mm', '18mm', '19mm Blockboard', '25mm board');

      if (isset($_POST['submit_stock'])) {
        # update according to form submission by user
        $brandName = $_POST['brandName'];               //brandName selected from form
        $itemThickness = $_POST['itemThickness'];       //itemThickness selected from form

        #code for updating stock of brands
        if (!empty($_POST['itemDimension'])) {
      
          $itemDimension = @$_POST['itemDimension'];    //itemDimension selected from form
          
          #query to select required stock value from table
          $sqlQuery = "SELECT `stock` FROM `brand` WHERE `brand_name` = '$brandName' AND `dimension` = '$itemDimension' AND `thickness` = '$itemThickness'";
          $queryRun = mysqli_query($con, $sqlQuery);
          $qeuryRow = @mysqli_fetch_assoc($queryRun);
          $itemQuantity = $qeuryRow['stock'];

          if (!empty($_POST['itemDispatch'])) {
            # deduct dispatched stock...
            $itemQuantity = $itemQuantity - $_POST['itemDispatch'];
          }

          if (!empty($_POST['itemAdd'])) {
            # add new stock...
            $itemQuantity = $itemQuantity + $_POST['itemAdd'];
          }

          $updateQuery = "UPDATE `brand` SET `stock`= '$itemQuantity' WHERE `brand_name` = '$brandName' AND `dimension` = '$itemDimension' AND `thickness` = '$itemThickness'";
          $updateQueryRun = mysqli_query($con, $updateQuery);
        }
        else{
          $brandName = 'star M.R.';
          $itemDimension = "8x4";
          $itemThickness = '4mm';
        }
      }

  ?>

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <link rel="icon" href="assets/ico/favicon.ico" type="image/vnd.microsoft.icon"/>
      <title>Home</title>

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

      <!-- Custom styles for login -->
      <link href="assets/css/signin.css" rel="stylesheet">
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

          <!-- Jumbotron -->
          <div class="jumbotron">
            <h1>Om Enterprises</h1>
          </div>
            
          <!-- form for stock management -->
          <form name="stockManagement" action="#" method="POST" id="stockManagement">
            <table class="table table-hover table-bordered">
              <tbody>
                <tr>
                  <th>Brand Name</th>
                  <th>Dimension</th>
                  <th>Thickness</th>
                  <th>Available</th>
                  <th>Dispatch</th>
                  <th>Add</th>
                </tr>
                <tr>
                  <td>
                    <!-- selection of brand name -->
                    <select class="form-control" name="brandName" id="brandName">
                      <?php

                        $selectBrands = mysqli_query($con, "SELECT DISTINCT `brand_name` FROM `brand`");
                        while ($brandRow = mysqli_fetch_assoc($selectBrands)) {
                            $brandNameValue = $brandRow['brand_name'];
                            # iteratively generate options for brand names...
                            echo "<option "; 
                            if ($brandName == $brandNameValue) 
                              echo 'selected'; 
                            echo " value='".$brandNameValue."'>".$brandNameValue."</option><br>";
                        }
                      ?>
                    </select>
                  </td>
                  <td>
                    <!-- selection of item dimension -->
                    <select class="form-control" name="itemDimension" id="itemDimension">
                      <?php

                        $selectDimension = mysqli_query($con, "SELECT DISTINCT `dimension` FROM `brand`");
                        while ($dimensionRow = mysqli_fetch_assoc($selectDimension)) {
                          # iteratively generate options for brand dimensions...
                          $dimensionValue = $dimensionRow['dimension'];
                          echo "<option "; 
                          if ($itemDimension == $dimensionValue) 
                            echo 'selected'; 
                          echo " value='".$dimensionValue."'>".$dimensionValue."</option><br>";
                        }
                      ?>
                    </select>
                  </td>
                  <td>
                    <!-- selection of item thickness -->
                    <select class="form-control" name="itemThickness" id="itemThickness">
                      <?php
                        
                        $selectThickness = mysqli_query($con, "SELECT DISTINCT `thickness` FROM `brand`");
                        while ($thicknessRow = mysqli_fetch_assoc($selectThickness)) {
                          # iteratively generate options for brand thickness...
                          $thicknessValue = $thicknessRow['thickness'];
                          echo "<option "; 
                          if ($itemThickness == $thicknessValue) 
                            echo 'selected'; 
                          echo " value='".$thicknessValue. "'>".$thicknessValue. "</option><br>";
                        }
                      ?>
                    </select>
                  </td>
                  <td name="itemQuantity" id="itemQuantity">
                    <?php
                      echo $itemQuantity;
                    ?>
                  </td>
                  <td>
                    <!-- quantity of items dispatched -->
                    <div class="form-group">
                      <input type="number" class="form-control" placeholder="0" name="itemDispatch" id="itemDispatch">
                    </div>
                  </td>
                  <td>
                    <!-- quantity of items to be added -->
                    <div class="form-group">
                      <input type="number" class="form-control" placeholder="0" name="itemAdd" id="itemAdd">
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <input type="submit" class="btn btn-default" label="Submit" value="Submit" id="submitStock" name="submit_stock">
          </form>
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