<?php
include_once '../Database.php';

$db = new Database();

$campus = $_POST['removeCampus'];
$db->AdminRemoveCampus($campus);

?>