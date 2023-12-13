<?php
include '../config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

if (isset($_POST['post_es'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$es_date = date('d M, Y');

	$sql = "INSERT INTO events_seminars (es_title, es_description, es_date) VALUES ('$title', '$description', '$es_date')";
	mysqli_query($link, $sql);
	header('location: ../events&seminars');
}
?>