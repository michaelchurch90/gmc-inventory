<?php

include '../Database.php';

$db = new Database();


$item = $_POST['item'];
$campus = $_POST['campus'];
$dept = $_POST['dept'];
$assignedTo = $_POST['assignedTo'];
$manufacturer = $_POST['manufacturer'];
$model = $_POST['model'];
$serialNum = $_POST['serialNum'];
$lanMAC = $_POST['lanMAC'];
$wanMAC = $_POST['wanMAC'];
$comment = $_POST['Comment'];
$status = $_POST['Status'];
/*
$item = "an item";
$campus = 0;
$dept = 0;
$assignedTo = 'Michael';
$manufacturer = 'Toshiba';
$model = 'Model';
$serialNum = '0001';
$lanMAC = '1adsf';
$wanMAC = '2345';
*/
$db->InsertInventory($assignedTo,$campus,$item,$dept,$manufacturer,$model,$serialNum,$lanMAC,$wanMAC,$status,$comment);

?>