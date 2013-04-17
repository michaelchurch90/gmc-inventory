<?php

include_once '../Database.php';
$db = new Database();


$UserName = $_POST['username'];
$password = $_POST['password'];
$fName = $_POST['fName'];
$lName=$_POST['lName'];
$email = $_POST['email'];

if($_POST['privilege']=='1')
$IsAdmin=1;
else
$IsAdmin=0;

$db->adminAddUser($UserName,$password,$IsAdmin,$fName,$lName,$email);
echo "Success";
	

?>