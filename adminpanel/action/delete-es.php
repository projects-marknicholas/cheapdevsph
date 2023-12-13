<?php
include '../config.php';

$sql = "DELETE FROM events_seminars WHERE id = '".$_GET['id']."'";
mysqli_query($link, $sql);
header('location: ../events&seminars');
?>