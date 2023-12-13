<?php 
include '../../../config.php';
if (isset($_POST['post_image'])) {
    $output = '';  
    if(is_array($_FILES))   {  
      foreach ($_FILES['files']['name'] as $name => $value)  
        {  
             $file_name = explode(".", $_FILES['files']['name'][$name]);  
             $allowed_ext = array("jpg", "jpeg", "png", "gif", "mkv", "mp4");  
             if(in_array($file_name[1], $allowed_ext))  
             {    
                  $imageid = $_POST['imageid'];
                  $new_name = md5(rand()) . '.' . $file_name[1];  
                  $sourcePath = $_FILES['files']['tmp_name'][$name];  
                  $targetPath = "uploads/".$new_name;  
                  $sql = "INSERT INTO images (imageid, image) VALUES ('{$imageid}', '{$targetPath}')";
                  $image = mysqli_query($link,$sql);
                  if(move_uploaded_file($sourcePath, $targetPath))  
                  {  
                  }                 
             }            
        }  
   }
}

if (isset($_POST['description']) && isset($_POST['postid'])) {

  $description = $_POST['description'];
  $postid = $_POST['postid'];
  $postdate = $_POST['postdate'];
  
  $text_sql = "INSERT INTO posts (description, postdate, postid) VALUES ('{$description}', '{$postdate}', '{$postid}')";
  mysqli_query($link, $text_sql);
}

$select_sql = "SELECT * FROM client WHERE id = '".$postid."'";
$select_res = mysqli_query($link, $select_sql);
use PHPMailer\PHPMailer\PHPMailer;

if (mysqli_num_rows($select_res) > 0) {
  while($fetch_data = mysqli_fetch_assoc($select_res)){
    $_POST['mail'] = $fetch_data['username'];
    $_POST['firstname'] = $fetch_data['firstname'];
    function sendmail(){
        $name = "Unionworks Construction Company Inc.";  // Name of your website or yours
        $to = $_POST['mail'];  // mail of reciever
        $subject = "Project Status";
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
                    .login-btn{
                      padding: 7px 20px;
                      border: none;
                      color: white;
                      background-color: #241e19;
                      outline: none;
                    }
                </style>
            </head>
            <body>
                <p class='dear'>Hi ".$_POST['firstname'].",</p><br>
                <p>There is a new project status update that is posted on your timeline.</p><br>

                <p>To view the latest project status update that has been added to your timeline, please log into your account.</p><br>
                <p>Best regards,</p>
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
  }
}


header('Location: ../view-client.php?viewid='.$postid.' ');
?>