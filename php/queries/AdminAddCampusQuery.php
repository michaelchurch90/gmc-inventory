<?php
include_once "../Database.php";

$db = new Database();

$campus = $_POST['campus'];

$db->AddCampus($campus);

?>