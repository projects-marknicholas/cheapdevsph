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
		<form method="post" action="action/update-certificate.php?id=<?php echo $_GET['viewid']?>" class="main-right" id="mainbar" enctype="multipart/form-data">
			<?php 
				$sql = "SELECT * FROM employee WHERE id = '".$_GET['viewid']."'";
				$res = mysqli_query($link, $sql);

				if (mysqli_num_rows($res) > 0) {
					while ($result = mysqli_fetch_assoc($res)) {
						$name = $result['firstname'].' '.$result['lastname'];
					}
				}
			?>
			<p class="page-title">edit "<?php echo $name?>" certificate</p>

			<div class="edit-certificate-title">Signatures</div>
			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-title">certificate of employment signature</p>
					<input type="file" name="coe_signature" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">contractor signature</p>
					<input type="file" name="cpa_contractorsignature" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">commisioner of buildings signature</p>
					<input type="file" name="cpa_commisionerofbuildingssignature" class="cert-int">
				</div>
			</div>
			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-title">administrative signature</p>
					<input type="file" name="cpa_administrativesignature" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">assigned engineer signature</p>
					<input type="file" name="cpa_assignedengineersignature" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">assigned hr staff</p>
					<input type="file" name="rl_signature" class="cert-int">
				</div>
			</div>





			<div class="edit-certificate-title">certificate of employement (COE)</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">date issued</p>
					<input type="text" name="coe_issueddate" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">place issued</p>
					<input type="text" name="coe_issuedplace" class="cert-int">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">name</p>
					<input type="text" name="coe_name" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">position</p>
					<input type="text" name="coe_position" class="cert-int">
				</div>
			</div>





			<div class="edit-certificate-title">construction permit application (CPA)</div>
			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-title">permit no.</p>
					<input type="text" name="cpa_permitno" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">address</p>
					<input type="text" name="cpa_address" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">contractor</p>
					<input type="text" name="cpa_contractor" class="cert-int">
				</div>
			</div>
			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-title">issued</p>
					<input type="text" name="cpa_issued" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">issued to</p>
					<input type="text" name="cpa_issuedto" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">expires</p>
					<input type="text" name="cpa_expires" class="cert-int">
				</div>
			</div>
			<div class="grid-1">
				<div class="grid-item">
					<p class="grid-title">description of work</p>
					<textarea type="text" name="cpa_descriptionofwork" class="cert-int-area"></textarea>
				</div>
			</div>
			<div class="grid-1">
				<div class="grid-item">
					<p class="grid-title">staff comments</p>
					<textarea type="text" name="cpa_staffcomments" class="cert-int-area"></textarea>
				</div>
			</div>
			<div class="grid-1">
				<div class="grid-item">
					<p class="grid-title">emergency contact no.</p>
					<input type="number" name="cpa_emergencycontactno" class="cert-int">
				</div>
			</div>





			<div class="edit-certificate-title">recommendation letter (RL)</div>
			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-title">duration of work</p>
					<textarea type="text" name="rl_durationofwork" class="cert-int"></textarea>
				</div>
				<div class="grid-item">
					<p class="grid-title">state skills</p>
					<textarea type="text" name="rl_stateskills" class="cert-int"></textarea>
				</div>
				<div class="grid-item">
					<p class="grid-title">personal behaviour</p>
					<textarea type="text" name="rl_personalbehaviour" class="cert-int"></textarea>
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">target company</p>
					<input type="text" name="rl_targetcompany" class="cert-int">
				</div>
				<div class="grid-item">
					<p class="grid-title">detailed skills</p>
					<input type="text" name="rl_detailedskills" class="cert-int">
				</div>
			</div>





			<div class="edit-certificate-title">clearance form (CF)</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of Project/Building</p>
					<input type="text" name="cf_project" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact Person</p>
					<input type="text" name="cf_pcp" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="cf_pcn" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">email</p>
					<input type="text" name="cf_pe" class="cert-int-area">
				</div>
			</div>
			<div class="edit-certificate-title"></div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of the Contractor</p>
					<input type="text" name="cf_notc" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact Person</p>
					<input type="text" name="cf_ccp" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="cf_ccn" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">email</p>
					<input type="text" name="cf_ce" class="cert-int-area">
				</div>
			</div>

			<div class="edit-certificate-title"></div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of Sub Contractor Worker</p>
					<input type="text" name="nscw_one" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="nscw_onec" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of Sub Contractor Worker</p>
					<input type="text" name="nscw_two" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="nscw_twoc" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of Sub Contractor Worker</p>
					<input type="text" name="nscw_three" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="nscw_threec" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of Sub Contractor Worker</p>
					<input type="text" name="nscw_four" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="nscw_fourc" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Name of Sub Contractor Worker</p>
					<input type="text" name="nscw_five" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">Contact No</p>
					<input type="text" name="nscw_fivec" class="cert-int-area">
				</div>
			</div>

			<div class="edit-certificate-title"></div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Scope of Work</p>
					<input type="text" name="sw_one" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">deadline</p>
					<input type="text" name="sw_oned" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Scope of Work</p>
					<input type="text" name="sw_two" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">deadline</p>
					<input type="text" name="sw_twod" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Scope of Work</p>
					<input type="text" name="sw_three" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">deadline</p>
					<input type="text" name="sw_threed" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Scope of Work</p>
					<input type="text" name="sw_four" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">deadline</p>
					<input type="text" name="sw_fourd" class="cert-int-area">
				</div>
			</div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">Scope of Work</p>
					<input type="text" name="sw_five" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">deadline</p>
					<input type="text" name="sw_fived" class="cert-int-area">
				</div>
			</div>


			<div class="edit-certificate-title"></div>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-title">signature over printed name</p>
					<input type="file" name="spn_one" class="cert-int-area"><br><br>
					<p class="grid-title">signature name</p>
					<input type="text" name="spn_onen" class="cert-int-area">
				</div>
				<div class="grid-item">
					<p class="grid-title">signature over printed name</p>
					<input type="file" name="spn_two" class="cert-int-area"><br><br>
					<p class="grid-title">signature name</p>
					<input type="text" name="spn_twon" class="cert-int-area">
				</div>
			</div><br>&nbsp;
			<button class="btn-add" type="submit" name="update_certificate">edit changes</button><br><br>
		</form>
		<!-- ==================== Mainbar end ====================-->
	</main>
	<!-- ==================== Main end ====================-->


<!-- ==================== Script tag ====================-->
<script src="js/chart.js"></script>
<script src="js/side-bar.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/search-filter2.js"></script>
<script src="js/show.js"></script>
<!-- ==================== Script tag end ====================-->
</body>
</html>
<?php
		}
	}
?>