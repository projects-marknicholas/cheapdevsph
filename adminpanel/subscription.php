<?php
include 'config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Subscription - CheapDevs PH</title>

	<!-- Favicons -->
  	<link href="../assets/img/favicon.png" rel="icon">
  	<link href="../assets/img/favicon.png" rel="apple-touch-icon">
  	<link rel="stylesheet" type="text/css" href="css/index.css">

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
				<div class="main-sub-menu active-menu">
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
			<h2>Subscription</h2>

			<div class="table-div">
				<div class="table-div-flex">
					<div class="table-div-flex-left">
					<?php
						$query = "SELECT COUNT(*) FROM subscription";
						$s_query = mysqli_query($link, $query);

						if (mysqli_num_rows($s_query) > 0) {
							while ($count = mysqli_fetch_assoc($s_query)) {
					?>
					<div class="table-div-flex-left"><span class="blue"><?php echo $count['COUNT(*)']?></span> total subscriptions</div>
					<?php
							}
						}
						else{
					?>
					<div class="table-div-flex-left"><span class="blue"></span> No subscriptions</div>
					<?php
						}
					?>
					</div>
					<div class="table-div-flex-right">
						<input type="text" name="search" class="form-control-search" placeholder="Search" autocomplete="off" id="myInput" onkeyup="myFunction()">
					</div>
				</div>

				<table id="myTable">
					<thead>
						<tr>
							<th>Date</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM subscription ORDER BY id DESC";
							$res = mysqli_query($link, $sql);

							if (mysqli_num_rows($res) > 0) {
								while ($result = mysqli_fetch_assoc($res)) {
						?>
						<tr>
							<td><?php echo $result['sub_date']?></td>
							<td><?php echo $result['email']?></td>
							<td>
								<a href="action/delete-subscription.php?id=<?php echo $result['id']?>" class="btn-delete">Delete</a>
							</td>
						</tr>
						<?php
								}
							}
							else{
								echo "No subscription";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</main>

<script src="js/search-title.js"></script>
</body>
</html>