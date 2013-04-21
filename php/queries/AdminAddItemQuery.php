<?php
include_once '../Database.php';

$db=new Database();
$item = $_POST['ItemName'];
$db->AdminAddItemType($item);

?>