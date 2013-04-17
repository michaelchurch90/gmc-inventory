<?php
include_once '../Database.php';

$db = new Database();

$department = $_POST['removeDepartement'];
$db->AdminRemoveDepartment($department);

?>