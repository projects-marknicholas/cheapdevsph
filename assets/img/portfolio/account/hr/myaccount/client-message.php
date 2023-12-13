<?php
require_once '../../config.php';
session_start();
 
if(!isset($_SESSION["loggedinhr"]) || $_SESSION["loggedinhr"] !== true){
    header("location: ../../../");
    exit;
}

$sql_fetch = "SELECT * FROM hr WHERE id = ".$_SESSION['idhr']." ";
$fetch_query = mysqli_query($link, $sql_fetch);

if (mysqli_num_rows($fetch_query) > 0) {
	while ($fetch = mysqli_fetch_assoc($fetch_query)) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="Keywords" content="Unionworks, Construction Company, Unionworks Construction Company, Unionworks Construction Company Incorporation, Unionworks Construction Company Inc.">
    <meta name="Description" content="Unionworks Construction Company Incorporation is a company that undertake construction management of civil engineering, formwork, and concrete secondary products.">
    <meta property="og:image" content="../../../assets/img/og-image.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="436">
    <meta property="og:image:height" content="228">
    <meta property="og:description" content="Unionworks Construction Company Incorporation is a company that undertake construction management of civil engineering, formwork, and concrete secondary products.">
    <title>HR Attendance - Unionworks Construction Company Inc.</title>
    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Dancing+Script&family=Gideon+Roman&family=Lobster&family=Montserrat:wght@100;200;300;400;600&family=Moo+Lah+Lah&family=Mukta:wght@800&family=Neonderthaw&family=Open+Sans:wght@300;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@100;200;300;400;600;700&family=Raleway:wght@100&family=Roboto:wght@100;300;400;500&family=Shizuru&family=Space+Mono&family=Spline+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style type="text/css">
    	*{
    		scroll-behavior: none;
    	}
    	.employee-search{
    		padding: 5px;
    	}
    </style>
</head>
<body>
	<!-- ==================== Navigation bar ====================-->
	<nav>
		<div class="admin-navigation-left">
			<img src="../../../assets/svg/menu.svg" class="menu" onclick="sidebarToggle();">
			<h1>hr <?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?></h1>
		</div>
		<div class="admin-navigation-right">
			<img src="../../../assets/svg/profile.svg" class="profile">
			<div class="profile-tooltip">
				<a href="../register.php  " class="tooltip-anchor">Create Account</a>
				<a href="../../logout.php" class="tooltip-anchor">Logout</a>
			</div>
		</div>
	</nav>
	<!-- ==================== Navigation bar end ====================-->





	<!-- ==================== Main ====================-->
	<main>
		<!-- ==================== Sidebar ====================-->
		<div class="main-left" id="sidebar">
			<div class="sidebar-item">
				<img src="../../../assets/img/no-profile.png" class="admin-profile">
				<div class="sidebar-profile">
					<div>
						<p class="admin-name">hr <?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?></p>
						<p class="admin-status">online</p>
					</div>
				</div>
			</div>
			<div class="sidebar-divider">main navigation</div>
			<a href="./" class="anchor-side-item"><div class="sidebar-item">dashboard</div></a>

			<div class="sidebar-divider">management</div>
			<a href="attendance.php" class="anchor-side-item"><div class="sidebar-item">attendance</div></a>
			<a href="#" onclick="dropdownToggle();" class="anchor-side-item"><div class="sidebar-item">employees ↓</div></a>
			<div id="sidebar-dropdown">
				<a href="employees-list.php" class="anchor-side-item"><div class="sidebar-item drop-item"><li>employees list</li></div></a>
				<a href="rate-and-ot.php" class="anchor-side-item"><div class="sidebar-item drop-item"><li>rate and overtime list</li></div></a>
				<a href="leave.php" class="anchor-side-item"><div class="sidebar-item drop-item"><li>leave</li></div></a>
			</div>

			<div class="sidebar-divider">printables</div>
			<a href="payroll.php" class="anchor-side-item"><div class="sidebar-item">payroll</div></a>
			<a href="certificates.php" class="anchor-side-item"><div class="sidebar-item">certificates</div></a>

			<div class="sidebar-divider">clients and future client sides</div>
			<a href="clients.php" class="anchor-side-item"><div class="sidebar-item">clients</div></a>
			<a href="inquiries.php" class="anchor-side-item"><div class="sidebar-item">inquiries</div></a>
		</div>
		<!-- ==================== Sidebar end ====================-->

		<!-- ==================== Post modal ====================-->
		<form id="post-modal" method="post" action="action/client-post-text.php">
			<div class="post-box">
				<button type="button" onclick="showPostImage();" class="post-modal-exit">✖</button>
				<div class="post-nav">Create post</div>
				<div class="post-modal-area-divider"></div>
				<textarea class="post-modal-textarea" rows="5" placeholder="Type a description..." name="description"></textarea>
				<button type="button" class="svg-div-box" onclick="showPostImages();">
					<img src="svg/photo.svg" class="post-modal-svg">
					Upload with photo/video
				</button>
				<input type="text" name="postdate" value="<?php echo date('M d, Y')?>" hidden>
				<input type="text" name="postid" value="<?php echo $_GET['viewid']?>" hidden>
				<input type="text" name="imageid" value="<?php echo $_GET['viewid']?>" hidden>
				<button type="submit" name="post_text" class="btn-bulkprint" style="margin: 10px;">Post</button>
			</div>
		</form>

		<form id="post-modal-text" method="post" action="action/client-post.php" enctype="multipart/form-data">
			<div class="post-box">
				<button type="button" onclick="showPostImages(); showPostImage();" class="post-modal-exit">✖</button>
				<div class="post-nav">Create post</div>
				<div class="post-modal-area-divider"></div>
				<textarea class="post-modal-textarea" rows="5" placeholder="Type a description..." name="description"></textarea>
				<div id="preview"></div>
				<button type="button" class="svg-div-box" style="position: relative;">
					<label>
						<input type="file" name="files[]" id="file-input" style="position: absolute; opacity: 0;" multiple="">
						<img src="svg/photo.svg" class="post-modal-svg">
						<input type="text" name="postdate" value="<?php echo date('M d, Y')?>" hidden>
						<input type="text" name="postid" value="<?php echo $_GET['viewid']?>" hidden>
						<input type="text" name="imageid" value="<?php echo $_GET['viewid']?>" hidden>
						Select photo/video
					</label>
				</button>
				<button type="button" class="svg-div-box" onclick="showPostImages();">
					<img src="svg/text.svg" class="post-modal-svg">
					Text only
				</button>
				<button type="submit" name="post_image" class="btn-bulkprint" style="margin: 10px;">Post</button>
			</div>
		</form>
		<!-- ==================== Post modal end ====================-->

		<!-- ==================== Mainbar ====================-->
		<div class="main-right" id="mainbar">
			<?php 
				$sql = "SELECT * FROM client WHERE id = '".$_GET['viewid']."'";
				$res = mysqli_query($link, $sql);

				if (mysqli_num_rows($res) > 0) {
					while ($result = mysqli_fetch_assoc($res)) {
			?>
			<div class="page-title-box">
				<p class="page-title page-title-box"><?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?></p>
			</div>
			<p class="view-date"><?php echo $result['username']?></p>
			<?php
					}
				}
			?><br>

			<div class="client-message">
				<?php
					$sqli = "SELECT * FROM message WHERE messageid = '".$_GET['viewid']."".$_SESSION['idhr']."' AND ".$_SESSION['idhr']."".$_GET['viewid']." ";
					$resi = mysqli_query($link, $sqli);

					if (mysqli_num_rows($resi) > 0) {
						while ($resulti = mysqli_fetch_assoc($resi)) {
							if ($_SESSION['idhr'] == $resulti['sessionid']) {
				?>
				<div class="right-message">
					<p class="righter"><?php echo nl2br($resulti['message'])?></p>
				</div>
				<?php
							}
							else{
				?>
				<div class="left-message">
					<p class="lefter"><?php echo nl2br($resulti['message'])?></p>
				</div>
				<?php
							}
						}
					}
				?>
				<div id="locator"></div>
			</div>
			<form method="post" action="action/send-message.php" class="client-message-int">
				<input type="text" name="messageid" value="<?php echo $_GET['viewid']?>" hidden>
				<textarea class="area-mess" placeholder="Type a message..." name="message"></textarea>
				<button type="submit" name="send_message" class="btn-send-mess">Send</button>
			</form>
		</div>
		<!-- ==================== Mainbar end ====================-->
	</main>
	<!-- ==================== Main end ====================-->


<!-- ==================== Script tag ====================-->
<script src="js/chart.js"></script>
<script src="js/side-bar.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/search-filter1.js"></script>
<script src="js/post.js"></script>
<script src="js/previewImages.js"></script>
<!-- ==================== Script tag end ====================-->
</body>
</html>
<?php
		}
	}
?>