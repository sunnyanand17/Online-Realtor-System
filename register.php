<?php
require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
   $name = trim($_POST['txt_name']);
   $dob = trim($_POST['txt_dob']);
   $gender = trim($_POST['txt_gender']);
   $city = trim($_POST['txt_city']);
   $zip = trim($_POST['txt_zip']);
   $country = trim($_POST['txt_country']);
   $email = trim($_POST['txt_email']);
   $password = trim($_POST['txt_password']);
 
   if($name=="") {
      $error[] = "provide username !"; 
   }
   else if($email=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($password=="") {
      $error[] = "provide password !";
   }
   else if(strlen($password) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT EMAIL FROM users WHERE EMAIL=:email");
         $stmt->execute(array(':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         
          if($row['user_email']==$email) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($name,$dob,$gender,$city,$zip,$country,$email,$password)) 
            {
                $user->redirect('register.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
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
          <li ><a href="buy.php">Buy </span></a></li>
          <li><a href="rent.php">Rent </a></li>
          <li><a href="mortgage.php">Mortgage </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
 






    <!-- Page Content -->
    <div class="container">

<b class="stat">Realtors.com</b>
    <div class="box3">

  <h2><u>Register</u></h2>
    <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
  <form role="form" action="" method="post" class="registration-form">
  <p>Fields marked in (*) are compulsory.</p>
              <fieldset class="form-group">
            <label for="name">Name(*)</label>
            <input type="text" class="form-control" id="name" name="txt_name" placeholder="Enter name">
        </fieldset>
                
              <fieldset class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="txt_dob" placeholder="Enter Date of Birth">
        </fieldset>
              <fieldset class="form-group">
              <label for="exampleSelect1">Gender</label>
              <select class="form-control" id="gender" name="txt_gender">
                  <option>Male</option>
                  <option>Female</option>
              </select>
        </fieldset>
              <fieldset class="form-group">
              <label for="exampleSelect1">Select City</label>
              <select class="form-control" id="city" name="txt_city">
                  <option>Austin</option>
                  <option>Dallas</option>
                  <option>Houston</option>
                  <option>Lewisville</option>
              </select>
       </fieldset>
        <fieldset class="form-group">
            <label for="zipcode">Zipcode</label>
            <input type="text" class="form-control" id="zip" name="txt_zip" placeholder="Enter zipcode">
        </fieldset>
              <fieldset class="form-group">
              <label for="exampleSelect1">Country</label>
              <select class="form-control" id="country" name="txt_country">
                  <option>USA</option>
              </select>
        </fieldset>
              <fieldset class="form-group">
            <label for="email">Email(*)</label>
            <input type="text" class="form-control" id="email" name="txt_email" placeholder="Enter email">
        </fieldset>
              <fieldset class="form-group">
            <label for="password">Password(*)</label>
            <input type="password" class="form-control" id="password" name="txt_password" placeholder="Enter password">
        </fieldset>
          </form>
              <button type="submit" class="btn" id="btn-signup">Sign me up!</button>
  </div>
</div>
     
    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!--<script src="js/script.js"></script> -->
    <script src="script1.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
