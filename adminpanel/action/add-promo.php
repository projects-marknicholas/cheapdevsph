<?php
include '../config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

if (isset($_POST['post_promo'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$promo_date = date('d M, Y');

	$sql = "INSERT INTO promo (promo_title, promo_description, promo_date) VALUES ('$title', '$description', '$promo_date')";
	mysqli_query($link, $sql);
	header('location: ../promo');
}
?>