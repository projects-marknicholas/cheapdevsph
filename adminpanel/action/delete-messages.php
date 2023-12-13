<?php
include '../config.php';

$sql = "DELETE FROM messages WHERE id = '".$_GET['id']."'";
mysqli_query($link, $sql);
header('location: ../messages');
?>