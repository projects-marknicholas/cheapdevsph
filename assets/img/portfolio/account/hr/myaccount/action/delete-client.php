<?php

include '../../../config.php';

if (isset($_GET['viewid'])) {
	$sql = "DELETE FROM client WHERE id = '".$_GET['viewid']."' ";
	mysqli_query($link, $sql);
	header('Location: ../clients.php');
}

?>