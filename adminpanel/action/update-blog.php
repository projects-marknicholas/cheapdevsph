<?php
include '../config.php';

if (isset($_POST['update_blog'])) {
	$id = $_POST['id'];
	$news_title = $_POST['blog_title'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$sql = "UPDATE blogs SET blog_title = '".$title."', blog_description = '".$description."' WHERE id = '".$id."'";
	mysqli_query($link, $sql);

	header('location: ../view-blog?id='.$id.'&title='.$title.'');
}
?>