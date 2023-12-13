<?php
include 'adminpanel/config.php';
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['subscribe'])){
	$email = $_POST['email'];
	$email_date = date('M d, Y');

	$sql = "INSERT INTO subscription (email, sub_date) VALUES ('$email', '$email_date')";
	mysqli_query($link, $sql);

	function sendmail(){
		$name = "CheapDevs PH"; 
		$to = $_POST['email'];  
		$subject = 'Thankyou for your subscribing';
		$body = "

		Thankyou for subscribing to our newsletter.<br><br>
		Thankyou for subscribing to our newsletter! We promise to keep you updated on our latest uploads.<br><br>
		- CheapDevs PH Team

		";
		$from = "cheapdevsph@gmail.com";
		$password = "zoiwzynmyvxlkoej";  

					           
		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";
		$mail = new PHPMailer();

					                

					            
		$mail->isSMTP();                        
		$mail->Host = "smtp.gmail.com"; 
		$mail->SMTPAuth = true;
		$mail->Username = $from;
		$mail->Password = $password;
		$mail->Port = 587; 
		$mail->SMTPSecure = "tls"; 
		$mail->smtpConnect([
			'ssl' => [
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			]
		]);

					             
		$mail->isHTML(true);
		$mail->setFrom($from, $name);
		$mail->addAddress($to);
		$mail->Subject = ("$subject");
		$mail->Body = $body;
		if ($mail->send()) {
			echo "";
		} else {
			echo "";
		}
	}
	sendmail();

	header('location: ./');
}
?>