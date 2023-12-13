<?php
include '../config.php';

if (isset($_POST['update_es'])) {
	$id = $_POST['id'];
	$es_title = $_POST['es_title'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$sql = "UPDATE events_seminars SET es_title = '".$title."', es_description = '".$description."' WHERE id = '".$id."'";
	mysqli_query($link, $sql);

	header('location: ../view-events&seminars?id='.$id.'&title='.$title.'');
}
?>