<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
 $user->redirect('login.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_SESSION['cityI'])) {
$city= $_SESSION['cityI'];
}
else{
    $city="";
}
unset($_SESSION['cityI']);

#$city =$cityI;
?><!DOCTYPE html>
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
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
	<script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type="text/javascript" src='jquery-1.9.1.min.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="css/shop-homepage.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


  </head>

<body background="image/background1.jpg">
	
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
        <div class="row">

            <div class="col-md-4">

            <p><b><h1 style="color:#fff; font-family:courier;" class="stat">ADMIN CONSOLE</h1></b></p>
            <div class="stat">
            <div class="box1">


					<form method="post" action="admin.php">
					  
					  <fieldset class="form-group">
					    <label for="exampleSelect1">Select City</label>
					    <select class="form-control"  name="city">
                <option value="AUSTIN">Austin</option>
					      <option value="DALLAS">Dallas</option>
					      <option value="HOSTON">Houston</option>
					      <option value="LEWISVILLE">Lewisville</option>
					    </select>
					  </fieldset>
					 <fieldset class="form-group">
					    <label for="exampleSelect1">Estate Type</label>
					    <select class="form-control" name="type">
					      
                <option value="Flat">Flat</option>
					      <option value="Suite">Suite</option>
                <option value="Condo">Condo</option>
                <option value="Townhouse">Town House</option>
                <option value="Villa">Villa</option>
                <option value="Apartment">Apartment</option>
					    </select>
					  </fieldset>
					  
					  <p><b>No of bed rooms</b></p>
					  <div class="radio">
					    <label>
					      <input type="radio" name="bed" id="optionsRadios1" value="1" checked>
					      1 Bed
					    </label>
					  </div>
					  <div class="radio">
					    <label>
					      <input type="radio" name="bed" id="optionsRadios2" value="2">
					      2 Bed
					    </label>
					  </div>
					  <p><b>No of bath rooms</b></p>

					  <div class="radio">
					    <label>
					      <input type="radio" name="bath" id="optionsRadios1" value="1" checked>
					      1 bath
					    </label>
					  </div>
					  <div class="radio">
					    <label>
					      <input type="radio" name="bath" id="optionsRadios2" value="2">
					      2 bath
					    </label>
					  </div>

            <input type="hidden" name="delid" value=""/>
					  <button type="submit" class="btn btn-primary" id="bttn" >Filter Results</button>
					  
					</form>
          <form action = "additem.html">
            <button type="submit" class="btn btn-primary" id="bttn">Add new item</button>
          </form>


			</div>
			</div>
            </div>

                <div class="col-md-8"><div class="row">
                <div id="buyadmin">
                    <p><h3><u>BUY</u></h3></p>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "test";

                    if($_SERVER["REQUEST_METHOD"] == "POST")
                    {

                    // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                      if ($conn->connect_error) 
                      {
                        die("Connection failed: " . $conn->connect_error);
                      } 

                      $city = $_POST["city"];
                      $delid = $_POST["delid"];
                      $type = $_POST["type"];
                      $bed = $_POST["bed"];
                      $bath = $_POST["bath"];


                      if($delid=="")
                      {}
                      else
                      {
                        $sql = "DELETE FROM estate WHERE ESTATE_ID = '$delid'";
                        $conn->query($sql);

                      }

                      $sql = "SELECT ESTATE_ID, PRICE, STREET_ADDRESS, BATHROOMS, ROOMS, ZIP, CITY, SALE_TYPE, ESTATE_TYPE, STATE, COUNTRY, AREA FROM estate WHERE CITY = '$city' 
                      AND ESTATE_TYPE = '$type' AND SALE_TYPE='B' AND ROOMS='$bed' AND BATHROOMS='$bath'";


                      $result = $conn->query($sql);


                      if ($result->num_rows > 0) 
                      {
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                        	
                            echo '<div class="col-sm-4 col-lg-4 col-md-4">
                                            <div class="thumbnail">
                                                <img src="image/'.$row['ESTATE_ID'].'.jpg" alt="" >
                                                <div class="caption">
                                                    <h4>$ '.$row['PRICE'].'</a>
                                                    </h4>
                                                    <p>'.$row['STREET_ADDRESS'].'</p>
                                                    <p>'.$row['CITY'].', '.$row['ZIP'].' </p>
                                                    <p>'.$row['ROOMS'].' bd&nbsp;|&nbsp;'.$row['BATHROOMS'].' ba&nbsp;|&nbsp;'.$row['AREA'].'sq ft|&nbsp; </p>
                                                    
                                                  
                                                </div>
                                                <div style="width:400px;">
                                                <div style="float: left; width: 130px"> 
                                                  <form action="update.php" method="POST">
                                                    <input type="hidden" value='.$row['ESTATE_ID'].' name="upid" />
                                                    <input type="hidden" value="0" name="flag" />
                                                    <input type="hidden" value='.$city.' name="city" />                                
                                                    <input type="hidden" value='.$type.' name="type" />
                                                    <input type="hidden" value='.$bed.' name="bed" />
                                                    <input type="hidden" value='.$bath.' name="bath" />
                                                    <input type="hidden" value='.$row['SALE_TYPE'].' name="saletype" />
                                                    <input type="hidden" value='.$row['STREET_ADDRESS'].' name="address" />
                                                    <input type="hidden" value='.$row['PRICE'].' name="price" />
                                                    <input type="hidden" value='.$row['ZIP'].' name="zip" />
                                                    <input type="hidden" value='.$row['COUNTRY'].' name="country" />
                                                    <input type="hidden" value='.$row['STATE'].' name="state" />
                                                    <input type="hidden" value='.$row['AREA'].' name="area" />
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                  </form>
                                                  </div>
                                                  <div style="float: right; width: 240px"> 
                                                  <form action="admin.php" method="POST">
                                                    <input type="hidden" value='.$row['ESTATE_ID'].' name="delid" />
                                                    <input type="hidden" value='.$city.' name="city" />                                
                                                    <input type="hidden" value='.$type.' name="type" />
                                                    <input type="hidden" value='.$bed.' name="bed" />
                                                    <input type="hidden" value='.$bath.' name="bath" />
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                  </form>
                                                  </div>
                                                  </div>
                                            </div>
                                        </div>  ';
                               
                        }
                      } 
                      else 
                      {
                          echo "<h3>No matches found.</h3>";
                      }
                      $conn->close();
                    }
                    ?>
                </div> 
                
                </div>
                <div class="row">
                <div id="rentadmin">
                <br><br><br><br>
                    <p><h3><u>RENT</u></h3></p>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "test";

                    if($_SERVER["REQUEST_METHOD"] == "POST")
                    {

                    // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                      if ($conn->connect_error) 
                      {
                        die("Connection failed: " . $conn->connect_error);
                      } 

                      $city = $_POST["city"];
                      $delid = $_POST["delid"];
                      $type = $_POST["type"];
                      $bed = $_POST["bed"];
                      $bath = $_POST["bath"];


                      if($delid=="")
                      {}
                      else
                      {
                        $sql = "DELETE FROM estate WHERE ESTATE_ID = '$delid'";
                        $conn->query($sql);

                      }

                      $sql = "SELECT ESTATE_ID, PRICE, STREET_ADDRESS, BATHROOMS, ROOMS, ZIP, CITY, SALE_TYPE, ESTATE_TYPE, STATE, COUNTRY, AREA FROM estate WHERE CITY = '$city' 
                      AND ESTATE_TYPE = '$type' AND SALE_TYPE='R' AND ROOMS='$bed' AND BATHROOMS='$bath' ";


                      $result = $conn->query($sql);


                      if ($result->num_rows > 0) 
                      {
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                          
                            echo '<div class="col-sm-4 col-lg-4 col-md-4">
                                            <div class="thumbnail">
                                                <img src="image/'.$row['ESTATE_ID'].'.jpg" alt="" >
                                                <div class="caption">
                                                    <h4>$ '.$row['PRICE'].'</a>
                                                    </h4>
                                                    <p>'.$row['STREET_ADDRESS'].'</p>
                                                    <p>'.$row['CITY'].', '.$row['ZIP'].' </p>
                                                    <p>'.$row['ROOMS'].' bd&nbsp;|&nbsp;'.$row['BATHROOMS'].' ba&nbsp;|&nbsp;'.$row['AREA'].'sq ft|&nbsp; </p>
                                                    
                                                  
                                                </div>
                                                <div style="width:400px;">
                                                <div style="float: left; width: 130px">
                                                  <form action="update.php" method="POST">
                                                    <input type="hidden" value='.$row['ESTATE_ID'].' name="upid" />
                                                    <input type="hidden" value="0" name="flag" />
                                                    <input type="hidden" value='.$city.' name="city" />                                
                                                    <input type="hidden" value='.$type.' name="type" />
                                                    <input type="hidden" value='.$bed.' name="bed" />
                                                    <input type="hidden" value='.$bath.' name="bath" />
                                                    <input type="hidden" value='.$row['SALE_TYPE'].' name="saletype" />
                                                    <input type="hidden" value='.$row['STREET_ADDRESS'].' name="address" />
                                                    <input type="hidden" value='.$row['PRICE'].' name="price" />
                                                    <input type="hidden" value='.$row['ZIP'].' name="zip" />
                                                    <input type="hidden" value='.$row['COUNTRY'].' name="country" />
                                                    <input type="hidden" value='.$row['STATE'].' name="state" />
                                                    <input type="hidden" value='.$row['AREA'].' name="area" />
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                  </form>
                                                  </div>
                                                  <div style="float: right; width: 240px"> 
                                                  <form action="admin.php" method="POST">
                                                    <input type="hidden" value='.$row['ESTATE_ID'].' name="delid" />
                                                    <input type="hidden" value='.$city.' name="city" />                                
                                                    <input type="hidden" value='.$type.' name="type" />
                                                    <input type="hidden" value='.$bed.' name="bed" />
                                                    <input type="hidden" value='.$bath.' name="bath" />
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                  </form>
                                                  </div>
                                                  </div>
                                            </div>
                                        </div>      ';
                               
                        }
                      } 
                      else 
                      {
                         echo "<h3>No matches found.</h3>";
                      }
                      $conn->close();
                    }
                    ?>
                </div> 



                
                                  
                </div>
            </div>




 
    <!-- /.container -->

</div>
</div>
        <!-- Footer -->
        

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
