<?php
include '../config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

if (isset($_POST['post_news'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$news_date = date('d M, Y');

	$sql = "INSERT INTO news (news_title, news_description, news_date) VALUES ('$title', '$description', '$news_date')";
	mysqli_query($link, $sql);
	header('location: ../news.php');
}
?>