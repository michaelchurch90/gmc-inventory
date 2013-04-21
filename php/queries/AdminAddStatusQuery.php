<?php
include_once '../Database.php';

$db=new Database();
$status = $_POST['StatusName'];
$db->AdminAddStatus($status);

?>