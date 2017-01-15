<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$name = $_POST["name"];
	$email = $_POST["email"];
	$dob = $_POST["dob"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];
	$gender = $_POST["gender"];
	$pass = $_POST["password"];
	$errorJS = $_POST["errorJS"];
	if($email=="" || $pass=="" || $name=="")
	{
		$errorJS="Compulsory fields missing";
	}

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

$sql = "SELECT USER_ID FROM `users` WHERE EMAIL ='$email'";
$result = $conn->query($sql);

if($errorJS==""){
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo 'Email Already Exists. Please use a different email to register.';
           
         
    }
} else {
	$uid=uniqid(); 
	$uploader= "Y"; ?>
<script>alert("SQL");</script>
	<?php
	
    $sql= "INSERT INTO users VALUES('$uid','$name','$dob', '$gender', '$city', '$zip', '$uploader','$country', '$email', '$pass')";
   if( $conn->query($sql))
   {

   	echo 'User registered successfully';
   }



}
}else{
	echo $errorJS;
}
$conn->close();
}
?>