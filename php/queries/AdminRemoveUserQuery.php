<?php
include_once '../Database.php';

$db= new Database();

$user = $_POST['users'];
$db->AdminRemoveUser($user);

?>