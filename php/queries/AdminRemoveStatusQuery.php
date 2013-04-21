<?php
include_once '../Database.php';

$db = new Database();

$status = $_POST['removeStatus'];
$db->AdminRemoveStatus($status);

?>