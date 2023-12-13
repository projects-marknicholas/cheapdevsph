<?php

require_once 'config.php';
$return = '';

if (isset($_POST['otp']) && isset($_GET['email'])) {
    $sql = "SELECT * FROM users WHERE username = '".$_GET['email']."'";
    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($result = mysqli_fetch_assoc($res)) {
            if ($_POST['otp'] == $result['otp']) {
                header('location: new-password?passid='.$result['id'].'&email='.$result['username'].'');
            }
            else{
                header('location: forgot-password');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title>CheapDevs PH - OTP code</title>

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
	        <h2>OTP code</h2>

            <?php echo $return?>

	        <form action="" method="post">
	            <div class="form-group">
	                <input type="text" name="otp" class="form-control" placeholder="OTP code">
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-primary" value="verify" name="verify">
	            </div><br>
	            <a href="./">Already have an account</a></p>
	        </form>
	    </div>
	</main>

</body>
</html>