<?php
include_once '../Database.php';
$db = new Database();
$UserName = $_POST['users'];
$email = $_POST['email'];

$db->AdminChangeEmail($UserName,$email);

?>