<?php
	include '../config.php';
	$otp = "";
	if (isset($_POST['set_otp'])){
		$sql = "SELECT * FROM employee WHERE password = '".$_GET['uniqid']."' ";
		$res = mysqli_query($link, $sql);

		if (mysqli_num_rows($res) > 0) {
			while ($result = mysqli_fetch_assoc($res)) {
				if ($result['code'] == $_POST['otp']) {
					header('Location: reset-password.php?uniqid='.$_GET['uniqid'].'');
				}
				else{
					$otp = "<div class='no-exist'>Incorrect OTP Code</div>";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
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
    <title>Employee Confirm OTP - Unionworks Construction Company Inc.</title>
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
            <h1>Confirm OTP code</h1>
            <p class="sign-description">We sent OTP code to your gmail!</p>
            <p><?php echo $otp?></p>

            <form action="" method="post" role="form">
                <div class="form-group">
                    <input type="number" name="otp" class="form-control" value="" autocomplete="off" placeholder="OTP code" style="display: block; margin: auto;"><br>
                </div>
                <div class="form-group">
                    <input type="submit" name="set_otp" class="btn btn-primary" value="Verify">
                </div>
            </form>
        </div>
    </main>
</body>
</html>