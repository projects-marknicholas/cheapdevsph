<?php
include '../config.php';

$sql = "DELETE FROM projects WHERE id = '".$_GET['id']."'";
mysqli_query($link, $sql);
header('location: ../projects');
?>