<?php
include_once '../Database.php';

$db=new Database();
$UserName = $_POST['users'];
$password = $_POST['password'];

$db->AdminChangePassword($UserName,$password);

?>