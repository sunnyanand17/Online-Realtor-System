<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->

    <title>Realtors.com</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
  <script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
  </head>

<body background="image/background1.jpg">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $id = $_POST["upid"];
    $city = $_POST["city"];
    $type = $_POST["type"];
    $bath = $_POST["bath"];
    $bed = $_POST["bed"];  
    $saletype = $_POST["saletype"];
    $zip = $_POST["zip"];
    $price = $_POST["price"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $area = $_POST["area"];
    $flag = $_POST["flag"];
?>
     <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img alt="Realtor" src="http://www.sunsetteam.co/images/realtor-logo-small.jpg"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
 
    <!-- Page Content -->
    <div class="container">

<b class="stat">Realtors.com</b>
    <div class="box3">

  <h2><u>UPDATE ITEM</u></h2>
  <form role="form" action="update.php" method="post" class="registration-form">
          <input type="hidden" value= <?php echo $id; ?> name="upid" />
          <input type="hidden" value= "1" name="flag" />
          <fieldset class="form-group">
              <label for="exampleSelect1">Estate Type</label>
              <select class="form-control" value= <?php echo $type; ?> name="type">
                
                <option value="Flat">Flat</option>
                <option value="Suite">Suite</option>
                <option value="Condo">Condo</option>
                <option value="Townhouse">Town House</option>
                <option value="Villa">Villa</option>
                <option value="Apartment">Apartment</option>
              </select>
            </fieldset>
                
          <fieldset class="form-group">
            <label for="sale">Sale Type</label>
            <input type="text" value=<?php echo $saletype; ?> class="form-control" id="sale" name="saletype" placeholder="Enter Sale Type">
          </fieldset>
          <fieldset class="form-group">
              <label for="street">Street Address</label>
               <input type="text" value=<?php echo $address; ?> class="form-control" id="street" name="address" placeholder="Enter Street Type">
          </fieldset>
          <fieldset class="form-group">
              <label for="bath">Bedrooms</label>
               <input type="text" value=<?php echo $bed; ?> class="form-control" id="bed" name="bed" placeholder="Enter Bedrooms">
          </fieldset>
          <fieldset class="form-group">
              <label for="bath">Bathrooms</label>
               <input type="text" value=<?php echo $bath ?> class="form-control" id="bath" name="bath" placeholder="Enter Bathroom">
          </fieldset>
          <fieldset class="form-group">
              <label for="bath">Area</label>
               <input type="text" value=<?php echo $area ?> class="form-control" id="area" name="area" placeholder="Enter Area">
          </fieldset>
          <fieldset class="form-group">
            <label for="price">Price</label>
            <input type="text" value=<?php echo $price; ?> class="form-control" id="estate" name="price" placeholder="Enter price">
          </fieldset>
          <fieldset class="form-group">
              <label for="exampleSelect1">Select City</label>
              <select class="form-control" id="city" name="city">
                <option value="AUSTIN">Austin</option>
                <option value="DALLAS">Dallas</option>
                <option value="HOSTON">Houston</option>
                <option value="LEWISVILLE">Lewisville</option>
              </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="zipcode">Zipcode</label>
            <input type="text" value=<?php echo $zip ?> class="form-control" id="zip" name="zip" placeholder="Enter zipcode">
          </fieldset>
          <fieldset class="form-group">
              <label for="state">State</label>
              <select class="form-control" id="state" name="state">
                  <option value="TX">TX</option>
              </select>
          </fieldset>
          <fieldset class="form-group">
              <label for="country">Country</label>
              <select class="form-control" value=<?php $country ?> id="country" name="country">
                  <option value="USA">USA</option>
              </select>
          </fieldset>
          <button id ="btn_login1" type="submit" class="btn btn-default">Update Item</button>      
          </form>
          
  </div>
</div>
     
    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $sql = "UPDATE ESTATE SET ESTATE_TYPE='$type', SALE_TYPE='$saletype',PRICE = '$price',STREET_ADDRESS = '$address',BATHROOMS='$bath',ROOMS = '$bed',ZIP = '$zip',CITY ='$city',COUNTRY = '$country',STATE = '$state', AREA = '$area' WHERE ESTATE_ID = '$id'";
  $row = $conn->query($sql);
    $conn->close();
  if($row && $flag=="1"){ ?>
<script>alert("Update successful..!!!");</script>
die("<script>location.href='http://localhost/realtors/febin/admin.php'</script>");
 //<?php
 

//header('location: admin.php');
  }
}


  //redirect to admin.php
?>
</body>

</html>
