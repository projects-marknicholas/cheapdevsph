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
					}
				}
			?><br><br>
			
			<?php
				$sql = "SELECT * FROM posts WHERE id = '".$_GET['viewid']."' ORDER BY id DESC";
				$res = mysqli_query($link, $sql);

				if (mysqli_num_rows($res) > 0) {
					while($result = mysqli_fetch_assoc($res)){
			?>
			<!-- ==================== Main post ====================-->
			<div style="width: 60%; margin: auto; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 7px;">
				<div class="post-main-bx">
					<div class="post-main-bx-nav">
						<p class="post-main-bx-name">Unionworks Construction Updates</p>
						<p class="post-main-bx-date"><?php echo $result['postdate']?></p>
					</div>
					<div class="post-main-bx-description"><?php echo nl2br($result['description'])?></div>
				</div>
				<?php 
					$image_sql = "SELECT * FROM images WHERE tracker = '".$result['tracker']."'";
					$image_res = mysqli_query($link, $image_sql);

					if (mysqli_num_rows($image_res) > 0) {
						while ($image_result = mysqli_fetch_assoc($image_res)) {
							$file = $image_result['image'];
							$ext = pathinfo($file, PATHINFO_EXTENSION);
							if ($ext == "mp4" || $ext == "mov" || $ext == "vob" || $ext == "mpeg" || $ext == "3gp" || $ext == "avi" || $ext == "wmv" || $ext == "mov" || $ext == "amv" || $ext == "svi" || $ext == "flv" || $ext == "mkv" || $ext == "webm" || $ext == "gif" || $ext == "asf") {
				?>
				<div class="post-main-bx-image">
					<video controls="" src="action/<?php echo $image_result['image']?>" class="post-min-img"></video>
					<button class="absolute-viewing">
						View Update
					</button>
				</div>
				<?php
							}
							else if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif"){
				?>
				<div class="post-main-bx-image">
					<img src="action/<?php echo $image_result['image']?>" class="post-min-img">
					<button class="absolute-viewing">
						View Update
					</button>
				</div>
				<?php
							}
							else{
				?>
				<?php
							}
						}
					}
				?>
				<div style="width: calc(100% - 20px); padding: 10px;"></div>
			</div>
			<!-- ==================== Main post end ====================--><br>
			<?php
					}
				}
			?>
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