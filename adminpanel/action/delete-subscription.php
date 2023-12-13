<?php
include '../config.php';

$sql = "DELETE FROM subscription WHERE id = '".$_GET['id']."'";
mysqli_query($link, $sql);
header('location: ../subscription');
?>