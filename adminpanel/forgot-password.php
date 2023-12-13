<?php

require_once 'config.php';
use PHPMailer\PHPMailer\PHPMailer;

$return = '';

if (isset($_POST['email']) && isset($_POST['send_code'])) {
    $sql = "SELECT * FROM users WHERE username = '".$_POST['email']."'";
    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($result = mysqli_fetch_assoc($res)) {
            $_POST['otp'] = $result['otp'];
            function sendmail(){
                $name = "CheapDevs PH"; 
                $to = 'cheapdevsph@gmail.com';  
                $subject = '[Password Recovery] CheapDevs PH';
                $body = "
                    Your OTP code is: <strong>".$_POST['otp']."</strong>
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
            header('location: otp?email='.$result['username'].'');
        }
    }
    else{
        $return = '<div class="alert alert-danger">No <strong>'.$_POST['email'].'</strong> exist.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title>CheapDevs PH - Forgot Password</title>

	<!-- Favicons -->
  	<link href="../assets/img/favicon.png" rel="icon">
  	<link href="../assets/img/favicon.png" rel="apple-touch-icon">
  	<link rel="stylesheet" type="text/css" href="css/index.css">

  	<!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>

	<main>
		<div class="wrapper">
			<img src="../assets/img/favicon.png" class="wrap-img">
		</div>
		<div class="wrapper wrap-sem">
	        <h2>Forgot Password</h2>

            <?php echo $return?>

	        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	            <div class="form-group">
	                <input type="email" name="email" class="form-control" placeholder="Email">
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-primary" value="send code" name="send_code">
	            </div><br>
	            <a href="./">Already have an account</a></p>
	        </form>
	    </div>
	</main>

</body>
</html>