<?php
include '../config.php';

if (isset($_POST['change_status'])) {
	$status = $_POST['status'];

	$sql = "UPDATE messages SET status = '".$status."' WHERE id = '".$_GET['id']."' ";
	mysqli_query($link, $sql);
	header('location: ../view-messages?id='.$_GET['id'].'&title='.$_GET['title'].'');
}
?>