<?php
include_once 'dbconfig.php';
$logout = $_REQUEST["logout"];

if($logout="true")
{
	$user->logout();
 $user->redirect('index.php');
}
?>