<?php
include_once "../Database.php";

$invNumber = $_POST['invNumber'];
$campus = $_POST['campus'];
$dept = $_POST['dept'];
$assignedTo = $_POST['assignedTo'];
$manufacturer = $_POST['manufacturer'];
$model = $_POST['model'];
$serialNum = $_POST['serialNum'];
$lanMAC = $_POST['lanMAC'];
$wanMAC = $_POST['wanMAC'];
$status = $_POST['Status'];
$comment = $_POST['Comment'];
$item=$_POST['item'];

$db = new Database();

$db->UpdateInventory($assignedTo,$campus,$item,$dept,$manufacturer,$model,$serialNum,$lanMAC,$wanMAC,$status,$comment,$invNumber);
?>