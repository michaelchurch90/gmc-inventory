<?php
include_once '../Database.php';
$db = new Database();
$announcement = $_POST['txtAddAnnouncement'];
$db->addAnnouncement($announcement);

?>