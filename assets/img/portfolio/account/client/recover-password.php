<?php
include '../config.php';
$mail_result = "";
use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['recover'])) {
    $email = mysqli_real_escape_string($link, trim($_POST['mail']));

    $sql = "SELECT * FROM client WHERE username = '".$email."' ";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        while($fetch = mysqli_fetch_assoc($query)){
            $mail_result = "<div class='exist'>we sent a otp code to your account.</div>";
            $_POST['body'] = $fetch['password'];
            $_POST['id'] = $fetch['id'];
            $_POST['firstname'] = $fetch['firstname'];
            $_POST['code'] = $fetch['code'];

            function sendmail(){
                $name = "Unionworks Construction Company Inc.";  // Name of your website or yours
                $to = $_POST['mail'];  // mail of reciever
                $subject = "Client Password Recovery";
                $body = "

                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title></title>
                        <style type='text/css'>
                            *{
                                padding: 0;
                                margin: 0;
                            }
                            .dear{
                                text-transform: capitalize;
                            }
                            .otp-box{
                                font-weight: bolder;
                                text-align: center;
                                font-size: 1.2em;
                            }
                            .code{
                                font-size: 3em;
                                text-align: center;
                                letter-spacing: 10px;
                            }
                            nav{
                                width: calc(100% - 40px);
                                padding: 20px;
                                background-color: brown;
                                text-align: center;
                                color: white;
                                font-weight: bolder;
                            }
                        </style>
                    </head>
                    <body>
                        <p class='dear'>Hi ".$_POST['firstname'].",</p><br>
                        <p>We recently received a request to reset your account password. Simply copy the OTP code below and we'll help you quickly and easily get back to manage your account.</p><br><br>

                        <div class='otp-box'>OTP Code</div><br>
                        <p class='code'>".$_POST['code']."</p><br><br>

                        <p>Please note: This otp code can only be used once and will become inactive in 24 hours. If you don't need to reset your password, please ignore this email.</p><br>
                        <p>Thanks,</p>
                        <p>Unionworks Construction Company Inc.</p>

                    </body>
                    </html>
                ";
                $from = "unionworksconstructioncompany@gmail.com";  // you mail
                $password = "wetywiqfmrfijjhz";  // your mail password

                // Ignore from here

                require_once "PHPMailer/PHPMailer.php";
                require_once "PHPMailer/SMTP.php";
                require_once "PHPMailer/Exception.php";
                $mail = new PHPMailer();

                // To Here

                //SMTP Settings
                $mail->isSMTP();
                // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
                $mail->Host = "smtp.gmail.com"; // smtp address of your email
                $mail->SMTPAuth = true;
                $mail->Username = $from;
                $mail->Password = $password;
                $mail->Port = 587;  // port
                $mail->SMTPSecure = "tls";  // tls or ssl
                $mail->smtpConnect([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    ]
                ]);

                //Email Settings
                $mail->isHTML(true);
                $mail->setFrom($from, $name);
                $mail->addAddress($to); // enter email address whom you want to send
                $mail->Subject = ("$subject");
                $mail->Body = $body;
                if ($mail->send()) {
                    echo "";
                } else {
                    echo "";
                }
            }
            sendmail();
            header('Location: otp.php?uniqid='.$fetch['password'].' ');
        }
    }
    else{
        $mail_result = "<div class='no-exist'>email does not exist</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="Unionworks, Construction Company, Unionworks Construction Company, Unionworks Construction Company Incorporation, Unionworks Construction Company Inc.">
    <meta name="Description" content="Unionworks Construction Company Incorporation is a company that undertake construction management of civil engineering, formwork, and concrete secondary products.">
    <meta property="og:image" content="assets/img/og-image.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="436">
    <meta property="og:image:height" content="228">
    <meta property="og:description" content="Unionworks Construction Company Incorporation is a company that undertake construction management of civil engineering, formwork, and concrete secondary products.">
    <title>Client Password Recovery - Unionworks Construction Company Inc.</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Dancing+Script&family=Gideon+Roman&family=Lobster&family=Montserrat:wght@100;200;300;400;600&family=Moo+Lah+Lah&family=Mukta:wght@800&family=Neonderthaw&family=Open+Sans:wght@300;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@100;200;300;400;600;700&family=Raleway:wght@100&family=Roboto:wght@100;300;400;500&family=Shizuru&family=Space+Mono&family=Spline+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</head>
<body>
    <main>
        <nav></nav>
        <div class="main-wrapper">
            <h1>Forgot Password</h1>
            <p class="sign-description">New Password</p>
            <p><?php echo $mail_result?></p>

            <form action="" method="post" role="form">
                <div class="form-group">
                    <input type="email" name="mail" class="form-control" value="" autocomplete="off" placeholder="Email" style="display: block; margin: auto;"><br>
                </div>
                <div class="form-group">
                    <input type="submit" name="recover" class="btn btn-primary" value="Send">
                </div>
            </form>
        </div>
    </main>
</body>
</html> 