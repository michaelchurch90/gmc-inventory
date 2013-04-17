<?php

include_once '../Database.php';
include_once '../User.php';
session_start();
$db = new Database();


$user = $_SESSION['user'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];
$email = $_POST['email'];

if($confirmPassword == $newPassword)
{
	$db->updateUser($user->getUserName(),$newPassword,$email);
	echo 'USER:',$user;
	
}
else
	echo "passwords do not match";

?>