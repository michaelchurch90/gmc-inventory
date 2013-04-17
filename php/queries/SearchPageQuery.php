<?php
include_once '../Database.php';
$invNumber = $_POST['invNumber'];
$campus = $_POST['campus'];
$dept = $_POST['dept'];
$assignedTo = $_POST['assignedTo'];
$manufacturer = $_POST['manufacturer'];
$model = $_POST['model'];
$serialNum = $_POST['serialNum'];
$lanMAC = $_POST['lanMAC'];
$wanMAC = $_POST['wanMAC'];


if($dept=='any')
	$dept="";
if($campus=='any')
	$campus="";
$db = new Database();
/*
$invNumber = 0;
$campus = 0;
$dept = 0;
$assignedTo = 'Michael';
$manufacturer = 'Toshiba';
$model = 'Model';
$serialNum = '0001';
$lanMAC = '1adsf';
$wanMAC = '2345';

*/
$resultTable = $db->searchInventory($invNumber,$campus,$dept ,$assignedTo,$manufacturer,$model,$serialNum,$lanMAC,$wanMAC);
//$resultTable = $db->searchInventory();
$resultTable->toTable();



?>