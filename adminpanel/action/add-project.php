<?php
include '../config.php';

if (isset($_POST['post_project'])) {
	$project_title = $_POST['project_title'];
	$price = $_POST['price'];
	$project_link = $_POST['project_link'];
	$project_category = $_POST['project_category'];
	$project_date = date('M d, Y');

	$sql = "INSERT INTO projects (project_title, price, project_link, project_category, project_date) VALUES ('$project_title', '$price', '$project_link', '$project_category', '$project_date')";
	mysqli_query($link, $sql);
	header('location: ../projects');
}


?>