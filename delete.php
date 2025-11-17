<?php
include "config.php";
requireLogin();
$id = $_GET["id"];
$all = loadContacts();
unset($all[$id]);
saveContacts(array_values($all));
header("Location:index.php");
?>
