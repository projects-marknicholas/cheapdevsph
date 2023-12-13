<?php
include '../config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

if (isset($_POST['post_blog'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$blog_date = date('d M, Y');

	$sql = "INSERT INTO blogs (blog_title, blog_description, blog_date) VALUES ('$title', '$description', '$blog_date')";
	mysqli_query($link, $sql);
	header('location: ../blog.php');
}
?>