<?php
include 'adminpanel/config.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $status = 'pending';
    $email_date = date('M d, Y');

    $stmt = $link->prepare("INSERT INTO messages (name, email, subject, message, status, email_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $subject, $message, $status, $email_date);
    $stmt->execute();
    $stmt->close();

    function sendmail()
    {
        $name = "CheapDevs PH Inquiry";
        $to = 'cheapdevsph@gmail.com';
        $subject = '[Inquiry]: ' . $_POST['subject'];
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
			        <p>Someone contacted you from the website.</p>
			        <div class='message'>
			            <p><strong>Name:</strong> " . $_POST['name'] . "</p>
			            <p><strong>Email:</strong> " . $_POST['email'] . "</p>
			            <p><strong>Message:</strong></p>
			            <p>" . nl2br($_POST['message']) . "</p>
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
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            echo "";
        } else {
            echo "";
        }
    }

    sendmail();
}
header('location: former.php?email=' . $_POST['email'] . '');
?>
