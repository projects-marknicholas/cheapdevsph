<?php
include '../config.php';

if (isset($_POST['update_news'])) {
	$id = $_POST['id'];
	$news_title = $_POST['news_title'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$sql = "UPDATE news SET news_title = '".$title."', news_description = '".$description."' WHERE id = '".$id."'";
	mysqli_query($link, $sql);

	header('location: ../view-news?id='.$id.'&title='.$title.'');
}
?>