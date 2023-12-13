<?php
include '../config.php';

$sql = "DELETE FROM news WHERE id = '".$_GET['id']."'";
mysqli_query($link, $sql);
header('location: ../news');
?>