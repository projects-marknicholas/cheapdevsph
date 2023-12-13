<?php
include 'config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

if (isset($_GET['id']) && isset($_GET['title']) && !empty($_GET['id']) && !empty($_GET['title'])) {
	$sql = "SELECT * FROM messages WHERE id = '".$_GET['id']."' AND name = '".$_GET['title']."' ";
	$res = mysqli_query($link, $sql);

	if (mysqli_num_rows($res) > 0) {
		while ($result = mysqli_fetch_assoc($res)) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $result['name']?> - CheapDevs PH</title>

	<!-- Favicons -->
  	<link href="../assets/img/favicon.png" rel="icon">
  	<link href="../assets/img/favicon.png" rel="apple-touch-icon">
  	<link rel="stylesheet" type="text/css" href="css/index.css">
  	<script src="js/chart.js"></script>

  	<!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>

	<main>
		<div class="main-left">
			<img src="../assets/img/logo.png" class="main-logo">
			<h1>cheapdevs ph</h1>

			<a href="dashboard">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">dashboard</span>
					</div>
				</div>
			</a>

			<a href="news">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">news</span>
					</div>
				</div>
			</a>

			<a href="events&seminars">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">events & seminars</span>
					</div>
				</div>
			</a>

			<a href="promo">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">promo</span>
					</div>
				</div>
			</a>

			<a href="blog">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">blog</span>
					</div>
				</div>
			</a>

			<a href="messages">
				<div class="main-sub-menu active-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">messages</span>
					</div>
				</div>
			</a>

			<a href="projects">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">projects</span>
					</div>
				</div>
			</a>

			<a href="subscription">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">subscription</span>
					</div>
				</div>
			</a>

			<a href="account">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">account</span>
					</div>
				</div>
			</a>

			<a href="logout">
				<div class="main-sub-menu">
					<div class="semi-sub-menu">
						<img src="" class="sub-menu-svg">
						<span class="spacing">sign out</span>
					</div>
				</div>
			</a>

		</div>
		<div class="main-right">
			<h2><?php echo $result['name']?></h2>

			<div class="view-box">
				<div class="view-item">
				<form method="post" action="action/update-status.php?id=<?php echo $_GET['id']?>&title=<?php echo $_GET['title']?>">
					<select name="status" class="form-control-search">
						<option>-- Current Status: [<?php echo $result['status']?>] --</option>
						<option value="seen">Seen</option>
						<option value="pending">Pending</option>
					</select>
					<button class="btn-add" name="change_status">Change</button>
				</form><br>
					<label><span class="<?php echo $result['status']?>" style="padding: 5px 10px;"><?php echo $result['status']?></span></label><br>
					<p class="mess-text">name: <span><?php echo $result['name']?></span></p>
					<p class="mess-text">email: <span style="text-transform: lowercase;"><?php echo $result['email']?></span></p>
					<p class="mess-text">subject: <span style="text-transform: none;"><?php echo $result['subject']?></span></p><br>
					<p class="mess-text">message: <br><br><span style="text-transform: none;"><?php echo nl2br($result['message'])?></span></p>
				</div>
			</div>
			

		</div>
	</main>

</body>
</html>
<?php			
		}
	}
}
else{
	header('location: messages');
}
?>