<?php

include '../../../config.php';

if (isset($_GET['viewid'])) {
	$sql = "DELETE FROM inquiries WHERE id = '".$_GET['viewid']."' ";
	mysqli_query($link, $sql);
	header('Location: ../inquiries.php');
}

?>