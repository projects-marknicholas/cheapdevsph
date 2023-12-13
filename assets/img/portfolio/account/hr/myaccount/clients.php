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



		<!-- ==================== Mainbar ====================-->
		<div class="main-right" id="mainbar">
			<p class="page-title">clients</p>
			<!-- ==================== Attendance table ====================-->
			<div class="attendance-div">
				<div class="table-top">
					<input type="text" id="employee-search" class="employee-search" placeholder="Search for employees..." onkeyup="searchEmployee();">
				</div>
				<table class="attendance-table" id="table">
					<tr class="attendance-tr">
						<tbody class="attendance-tbody">
							<th class="attendance-th">full name</th>
							<th class="attendance-th">email address</th>
							<th class="attendance-th">message</th>
							<th class="attendance-th">tools</th>
						</tbody>
					</tr>
					<?php
						$sql = "SELECT * FROM client ORDER BY id DESC";
						$res = mysqli_query($link, $sql);

						if (mysqli_num_rows($res) > 0) {
							while ($result = mysqli_fetch_assoc($res)) {
					?>
					<tr class="attendance-tr">
						<td class="attendance-td"><?php echo $result['firstname']?> <?php echo $result['lastname']?></td>
						<td class="attendance-td" style="text-transform: lowercase;"><?php echo $result['username']?></td>
							<?php
								$message_sql = "SELECT COUNT(*) FROM message WHERE sessionid = '".$result['id']."' AND status = 'client'";
								$message_res = mysqli_query($link, $message_sql);

								if (mysqli_num_rows($message_res) > 0) {
									while ($count = mysqli_fetch_assoc($message_res)) {
										if ($count['COUNT(*)'] == 0) {
							?>
						<td class="attendance-td">no messages</td>
							<?php
										}
										else{
							?>
						<td class="attendance-td"><?php echo $count['COUNT(*)']?> new messages</td>
							<?php
										}
									}
								}
							?>
						<td class="attendance-td">
							<a href="view-client.php?viewid=<?php echo $result['id']?>" class="btn-edit" style="text-decoration: none;">view</a>
							<a href="client-message.php?viewid=<?php echo $result['id']?>" class="btn-print" style="text-decoration: none;">message</a>
							<a href="action/delete-client.php?viewid=<?php echo $result['id']?>" class="btn-delete" style="text-decoration: none;">delete</a>
						</td>
					</tr>
					<?php
							}
						}
					?>
				</table>
			</div>
			<!-- ==================== Attendance table end ====================-->
		</div>
		<!-- ==================== Mainbar end ====================-->
	</main>
	<!-- ==================== Main end ====================-->


<!-- ==================== Script tag ====================-->
<script src="js/chart.js"></script>
<script src="js/side-bar.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/search-filter1.js"></script>
<!-- ==================== Script tag end ====================-->
</body>
</html>
<?php
		}
	}
?>