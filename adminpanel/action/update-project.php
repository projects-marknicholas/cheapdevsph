<?php
include '../config.php';

if (isset($_POST['update_project'])) {
	$id = $_POST['id'];
	$project_title = $_POST['project_title'];
	$title = $_POST['title'];
	$project_link = $_POST['project_link'];
	$price = $_POST['price'];

	$sql = "UPDATE projects SET project_title = '".$title."', project_link = '".$project_link."', price = '".$price."' WHERE id = '".$id."'";
	mysqli_query($link, $sql);

	header('location: ../view-project?id='.$id.'&title='.$title.'');
}
?>