<?php
include_once '../Database.php';

$db = new Database();

$item = $_POST['removeItem'];
$db->AdminRemoveItem($item);

?>