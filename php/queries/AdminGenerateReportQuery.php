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
$startDate= $_POST['startDate'];
$endDate=$_POST['lastDate'];
$status=$_POST['Status'];
$item=$_POST['item'];

if($campus=="any")
	$campus="";
if($dept=="any")
	$dept="";
if($status=="any")
	$status="";
if($item=="any")
	$item="";	


	
$db = new Database();

$resultTable = $db->searchInventory($invNumber,$campus,$dept ,$assignedTo,$manufacturer,$model,$serialNum,$lanMAC,$wanMAC, $status,$item,$startDate,$endDate);
//$resultTable = $db->searchInventory();
$resultTable->toTable();



?>