
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

  $sql = "INSERT INTO ESTATE  VALUES (NULL,'$type','$saletype','$price','$address','$bath','$bed','$zip','$city','$country','$state','$area')";
  

if($conn->query($sql))
{ ?>
  <script>alert("Added successfully..!!!");</script>

<?php 

}
else
  $conn->close();
header("location:admin.php");
  //redirect to admin.php

?>