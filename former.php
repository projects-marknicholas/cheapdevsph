<?php
include 'adminpanel/config.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET['email'])) {

	function sendmail(){
		$name = "CheapDevs PH"; 
		$to = $_GET['email'];  
		$subject = 'Thankyou for your message';
		$body = "
			<html>
			<head>
			    <style>
			        body {
			            font-family: Arial, sans-serif;
			        }
			        .container {
			            background-color: #f5f5f5;
			            padding: 20px;
			        }
			        .logo {
			            color: #0d6efd;
			            font-size: 24px;
			            font-weight: bold;
			        }
			        .message {
			            margin-top: 20px;
			            padding: 10px;
			            background-color: #ffffff;
			            border-radius: 5px;
			        }
			    </style>
			</head>
			<body>
			    <div class='container'>
			        <span class='logo'>CheapDevs PH</span>
			        <div class='message'>
			            <p>Thankyou for your interest in our services.<br><br>
						In response to your query, please find enclosed the requested details. I hope this information addresses your needs. If you require further clarifications, please do not hesitate to contact us at anytime.<br><br>
						We look forward to hear from you soon.</p>
			        </div>
			    </div>
			</body>
			</html>

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
}
header('location: ./');
?>