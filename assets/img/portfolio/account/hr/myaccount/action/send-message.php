<?php
	session_start();
 
	if(!isset($_SESSION["loggedinhr"]) || $_SESSION["loggedinhr"] !== true){
	    header("location: ../../../");
	    exit;
	}

	include '../../../config.php';
	
	if (isset($_POST['send_message'])) {
		$semi_id = $_SESSION['idhr'];
		$messageid = $_POST['messageid'].$semi_id;
		$message = $_POST['message'];

		$sql = "INSERT INTO message (sessionid, messageid, message) VALUES ('$semi_id', '$messageid', '$message')";
		mysqli_query($link, $sql);

		$update_sql = "UPDATE message SET status = '' WHERE messageid = '".$messageid."' AND '".$semi_id."".$_POST['messageid']."'";
		mysqli_query($link, $update_sql);
		header('Location: ../client-message.php?viewid='.$_POST['messageid'].'#locator');
	}
?>