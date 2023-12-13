<?php
include '../config.php';

if (isset($_POST['update_promo'])) {
	$id = $_POST['id'];
	$promo_title = $_POST['promo_title'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$sql = "UPDATE promo SET promo_title = '".$title."', promo_description = '".$description."' WHERE id = '".$id."'";
	mysqli_query($link, $sql);

	header('location: ../view-promo?id='.$id.'&title='.$title.'');
}
?>