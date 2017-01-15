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
?>
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
	
	<?php
// define variables and set to empty values
$id ="";
$city ="";



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
          <li><a href="buy.php">Buy </span></a></li>
          <li ><a href="rent.php">Rent </a></li>
          <li><a href="mortgage.html">Mortgage </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-star-empty"></span> Favourites</a></li>
            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
 






    <!-- Page Content -->
    <div class="container">
<b class="stat">Realtors.com</b>
        <div class="row">

            

               
                <div id="display">
                                <br><br>
                                <p><h3><u>Saved Items for Buying</u></h3></p>
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

                                if($_SERVER["REQUEST_METHOD"] == "POST"){

                                    $delid= $_POST["delid"];
                                    $sql = " DELETE from favourite where ESTATE_ID= '$delid' and  USER_ID = '$user_id' ";
                                $result = $conn->query($sql);


                                }


                                $User_Id=$_SESSION['user_session'];
                              

                                $sql = "SELECT ESTATE_ID, PRICE, STREET_ADDRESS, BATHROOMS, ROOMS, ZIP, CITY FROM estate WHERE ESTATE_ID IN (Select ESTATE_ID from favourite where USER_ID = '$user_id') AND SALE_TYPE= 'B'";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    	
                                        echo '<div class="col-sm-4 col-lg-4 col-md-4">
                                                        <div class="thumbnail">
                                                            <img src="image/'.$row['ESTATE_ID'].'.jpg" alt="" >
                                                            <div class="caption">
                                                                <h4>$ '.$row['PRICE'].'</a>
                                                                </h4>
                                                                <p>'.$row['STREET_ADDRESS'].'</p>
                                                                <p>'.$row['CITY'].', '.$row['ZIP'].' </p>
                                                                <p>'.$row['ROOMS'].' bd&nbsp;|&nbsp;'.$row['BATHROOMS'].' ba&nbsp;|&nbsp;&nbsp;&nbsp;2,663 sq ft  </p>
                                                                
                                                              
                                                            </div>
                                                            

                                                              <form action="favourite.php" method="POST">
                                                                
                                                                <input type="hidden" value='.$row['ESTATE_ID'].' name="delid" />
                                                                <button type="submit" class="btn btn-primary"  >Remove</button>
                                                                </form>
                                                        </div>
                                                    </div>      ';
                                           
                                         
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                
                                ?>


           </div>
           </div>


                        <div id="display">
                        <div class="row">
                                <br><br>
                                <p><h3><u>Saved Items for Renting</u></h3></p>
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

                                if($_SERVER["REQUEST_METHOD"] == "POST"){

                                    $delid= $_POST["delid"];
                                    $sql = " DELETE from favourite where ESTATE_ID= '$delid' and  USER_ID = '$user_id' ";
                                $result = $conn->query($sql);


                                }


                                $User_Id=$_SESSION['user_session'];
                              

                                $sql = "SELECT ESTATE_ID, PRICE, STREET_ADDRESS, BATHROOMS, ROOMS, ZIP, CITY FROM estate WHERE ESTATE_ID IN (Select ESTATE_ID from favourite where USER_ID = '$user_id') AND SALE_TYPE= 'R'";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        
                                        echo '<div class="col-sm-4 col-lg-4 col-md-4">
                                                        <div class="thumbnail">
                                                            <img src="image/'.$row['ESTATE_ID'].'.jpg" alt="" >
                                                            <div class="caption">
                                                                <h4>$ '.$row['PRICE'].'</a>
                                                                </h4>
                                                                <p>'.$row['STREET_ADDRESS'].'</p>
                                                                <p>'.$row['CITY'].', '.$row['ZIP'].' </p>
                                                                <p>'.$row['ROOMS'].' bd&nbsp;|&nbsp;'.$row['BATHROOMS'].' ba&nbsp;|&nbsp;&nbsp;&nbsp;2,663 sq ft  </p>
                                                                
                                                              
                                                            </div>
                                                            

                                                              <form action="favourite.php" method="POST">
                                                                
                                                                <input type="hidden" value='.$row['ESTATE_ID'].' name="delid" />
                                                                <button type="submit" class="btn btn-primary"  >Remove</button>
                                                                </form>
                                                        </div>
                                                    </div>      ';
                                           
                                         
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                
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
