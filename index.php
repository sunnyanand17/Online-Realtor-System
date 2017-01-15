<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
 $user->redirect('login.php');
}
$user_id = $_SESSION['user_session'];
if($user_id=="106")
{
    $user->redirect('admin.php');
}
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['cityI']="";
if(isset($_POST['btn-index']))
{
 $query = $_POST['query'];
 $city= $_POST['city'];
$_SESSION['cityI']=$city;
 if($query=="buy")
 {
  $user->redirect('buy.php');
 }
 else
 {
  $user->redirect('rent.php');
 } 
}
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
          <li><a href="rent.php">Rent </a></li>
          <li><a href="mortgage.html">Mortgage </a></li>
        </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="favourite.php"><span class="glyphicon glyphicon-star-empty"></span> Favourites</a></li>
            <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
 






    <!-- Page Content -->
    <div class="container">
<b class="stat">Realtors.com</b>
        <div class="row">

            <div class="col-md-5">
            <div class="stat">
                <div class="box">

                 <form class="navbar-form " method="POST" >
                         
                          <div class="form-group ">
                          <select class="form-control" name="query">
                                <option value="buy">Buy</option>
                                <option value="rent">Rent</option>
                          </select>
                          <input type="text" class="form-control" placeholder="Enter city" name="city">
                          </div>
                          <button type="submit" class="btn btn-default" name="btn-index">Search</button>
                 </form>
                </div>
                                <h4 style="color:#fff;">&nbsp;&nbsp;&nbsp;&nbsp;Realtors.com. Your Search starts here.</h4>

                </div>

            </div>

            <div class="col-md-7">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
								<li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="image/buy.jpg" alt="Bedroom Furniture">
									<div class="carousel-caption">
										<h1>Buy a Home</h1>
										<p><a class="btn btn-lg btn-primary" href="Bedroom.html" role="button">Start searching..</a></p>
									</div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/rent.jpg" alt="Living Room Furniture">
									<div class="carousel-caption">
										<h1>Rent a Home</h1>
										<p><a class="btn btn-lg btn-primary" href="LivingRoom.html" role="button">Start searching..</a></p>
									</div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="image/mortgage.jpg" alt="Dining Room Furniture">
									<div class="carousel-caption">
										<h1>Mortgage your property</h1>
										<p><a class="btn btn-lg btn-primary" href="DiningRoom.html" role="button">Learn More</a></p>
									</div>
                                </div>
								<div class="item">
                                    <img class="slide-image" src="image/register1.jpeg" alt="Miscellaneous Furniture">
									<div class="carousel-caption">
										<h1>Create an account</h1>
										<p><a class="btn btn-lg btn-primary" href="DiningRoom.html" role="button">Register</a></p>
									</div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
				

      

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3 style="color:#fff;">Featured Properties</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/villa1.jpg" alt="" >
                            <div class="caption">
                                <h4><a href="#">$789,787</a>
                                </h4>
                                <p>7740, McCallum Blvd, Dallas, TX 75252</p>
                                <p>4 bd&nbsp;|&nbsp;3 ba&nbsp;|&nbsp;2,663 sq ft</p>
                            </div>
                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/1005.jpg" alt="" >
                            <div class="caption">
                                <h4><a href="#">$869,709</a></h4>
                                <p>7760, McCallum Blvd, Austin, TX 87559</p>
                                <p>1 bd&nbsp;|&nbsp;2 ba&nbsp;|&nbsp;1,873 sq ft</p>
                            </div>
                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/1003.jpg" alt=""  >
                            <div class="caption">
                                <h4><a href="#">$579,530</a>
                                </h4>
                                <p>8786, Dickerson Street, Dallas, TX 65765</p>
                                <p>2 bd&nbsp;|&nbsp;2 ba&nbsp;|&nbsp;2,000 sq ft</p>
                            </div>
                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/villa2.jpg" alt="" >
                            <div class="caption">
                                <h4><a href="#">$700,500</a>
                                </h4>
                                <p>56, Northside Mall, Dallas, TX 78576</p>
                                <p>2 bd&nbsp;|&nbsp;1 ba&nbsp;|&nbsp;1,860 sq ft</p>
                            </div>
                            <div class="ratings">
                               
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/villa3.jpg" alt="" >
                            <div class="caption">
                                <h4><a href="#">$504,000</a>
                                </h4>
                                <p>21, Franklin Street, Houston, TX 98976</p>
                                <p>1 bd&nbsp;|&nbsp;2 ba&nbsp;|&nbsp;1,880 sq ft</p>
                            </div>
                            <div class="ratings">
                                
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/villa4.jpg" alt=""  >
                            <div class="caption">
                                <h4><a href="#">$300,000</a>
                                </h4>
                                <p>289, Hicker Blvd, Allen, TX 65765</p>
                                <p>2 bd&nbsp;|&nbsp;2 ba&nbsp;|&nbsp;2,880 sq ft</p>
                            </div>
                            <div class="ratings">
                                
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
        <!-- /.row -->
  <!-- Jumbotron Header -->
        
        <header class="jumbotron hero-spacer" style="background-image: url(image/realb1.jpg); background-size: 100%;" >
            <div class="realb">
            <h1>Realtors.com</h1>
            <p></p>
            <p><a href="ContactUs.html" class="btn btn-primary btn-large">Know about us</a>
            </p>
            </div>
        </header>
       
        

        
    

    </div>
    <!-- /.container -->
<hr>


     
    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
