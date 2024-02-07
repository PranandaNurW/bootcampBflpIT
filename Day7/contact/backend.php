<?php
require_once("DatabaseController.php");
require_once("ContactController.php");

$db = new Database();
$contact = new Contact($db);
?>