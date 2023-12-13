<?php
include 'config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

if (isset($_GET['id']) && isset($_GET['title']) && !empty($_GET['id']) && !empty($_GET['title'])) {
	$sql = "SELECT * FROM news WHERE id = '".$_GET['id']."' AND news_title = '".$_GET['title']."' ";
	$res = mysqli_query($link, $sql);

	if (mysqli_num_rows($res) > 0) {
		while ($result = mysqli_fetch_assoc($res)) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $result['news_title']?> - CheapDevs PH</title>

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
				<div class="main-sub-menu active-menu">
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
				<div class="main-sub-menu">
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
			<h2><?php echo $result['news_title']?></h2>

			<div class="view-box">
				<form method="post" action="action/update-news.php" class="view-item">
					<label>
						News TItle<br>
						<input type="text" name="id" value="<?php echo $_GET['id']?>" hidden>
						<input type="text" name="news_title" value="<?php echo $_GET['title']?>" hidden>
						<input type="text" name="title" class="form-control-input" required="" value="<?php echo $result['news_title']?>">
					</label><br>
					<label>
						News description<br>
						<?php
							$remarks = "";
							$remarks = htmlspecialchars($result['news_description']);
						?>
						<textarea type="text" name="description" class="form-control-input" rows="10"><?php echo $remarks?></textarea>
					</label>
					<button class="btn-update" name="update_news" type="submit">Update Content</button>
				</form>
				<form class="view-item" method="post" action="action/update-news-image.php" enctype="multipart/form-data">
					<label>news images</label>
					<input type="text" name="id" value="<?php echo $_GET['id']?>" hidden>
					<input type="text" name="title" value="<?php echo $_GET['title']?>" hidden>
					<input type="file" name="file" class="filer">
					<button class="btn-update" type="submit" name="image_1">Update Image 1</button>
					<button class="btn-update" type="submit" name="image_2">Update Image 2</button>
					<button class="btn-update" type="submit" name="image_3">Update Image 3</button>
					<br><br>
					<div class="row">
						<p>News Images</p>
					  	<div class="column">
					  		<?php
					  			if ($result['image_1'] == "") {
					  				echo '<img src="../uploads/no-image.png" alt="First Image">';
					  			}
					  			else{
					  				echo '<img src="../uploads/'.$result['image_1'].'" alt="First Image">';
					  			}
					  		?>
					  	</div>
					  	<div class="column">
					    	<?php
					  			if ($result['image_2'] == "") {
					  				echo '<img src="../uploads/no-image.png" alt="Second Image">';
					  			}
					  			else{
					  				echo '<img src="../uploads/'.$result['image_2'].'" alt="First Image">';
					  			}
					  		?>
					  	</div>
					  	<div class="column">
					    	<?php
					  			if ($result['image_3'] == "") {
					  				echo '<img src="../uploads/no-image.png" alt="Third Image">';
					  			}
					  			else{
					  				echo '<img src="../uploads/'.$result['image_3'].'" alt="First Image">';
					  			}
					  		?>
					  	</div>
					</div>
				</form>
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
	header('location: news');
}
?>
