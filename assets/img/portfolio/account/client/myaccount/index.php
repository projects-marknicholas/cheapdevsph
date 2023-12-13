<?php
require_once '../../config.php';
session_start();
 
if(!isset($_SESSION["loggedinclient"]) || $_SESSION["loggedinclient"] !== true){
    header("location: ../../../");
    exit;
}

$sql_fetch = "SELECT * FROM client WHERE id = ".$_SESSION['idclient']." ";
$fetch_query = mysqli_query($link, $sql_fetch);

if (mysqli_num_rows($fetch_query) > 0) {
    while ($fetch = mysqli_fetch_assoc($fetch_query)) {
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
    <title>My Account - Unionworks Construction Company Inc.</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Dancing+Script&family=Gideon+Roman&family=Lobster&family=Montserrat:wght@100;200;300;400;600&family=Moo+Lah+Lah&family=Mukta:wght@800&family=Neonderthaw&family=Open+Sans:wght@300;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@100;200;300;400;600;700&family=Raleway:wght@100&family=Roboto:wght@100;300;400;500&family=Shizuru&family=Space+Mono&family=Spline+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</head>
<body>

    <!-- ==================== Navigation bar ====================-->
    <nav>
        <div class="admin-navigation-left">
            <img src="../../../assets/svg/menu.svg" class="menu" onclick="sidebarPhoneToggle();">
            <img src="../../../assets/svg/menu.svg" class="menu phone-menu" onclick="showPhoneMenu();">
            <h1><?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?></h1>
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
                        <p class="admin-name"><?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?></p>
                        <p class="admin-status">online</p>
                    </div>
                </div>
            </div>
            <div class="sidebar-divider">main navigation</div>
            <a href="./" class="anchor-side-item"><div class="sidebar-item">dashboard</div></a>

            <div class="sidebar-divider">management</div>
            <a href="attendance.php" class="anchor-side-item"><div class="sidebar-item">attendance</div></a>
            <a href="payslip.php" class="anchor-side-item"><div class="sidebar-item">payslip</div></a>
            <a href="payroll.php" class="anchor-side-item"><div class="sidebar-item">payroll</div></a>

            <div class="sidebar-divider">requests</div>
            <a href="certificates.php" class="anchor-side-item"><div class="sidebar-item">certificates</div></a>
            <a href="leave.php" class="anchor-side-item"><div class="sidebar-item">leave</div></a>
        </div>
        <!-- ==================== Sidebar end ====================-->

        <!-- ==================== Sidebar phone ====================-->
        <div class="main-lefts" id="sidebar-phone">
            <div class="sidebar-item">
                <img src="../../../assets/img/no-profile.png" class="admin-profile">
                <div class="sidebar-profile">
                    <div>
                        <p class="admin-name"><?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?></p>
                        <p class="admin-status">online</p>
                    </div>
                </div>
            </div>
            <div class="sidebar-divider">main navigation</div>
            <a href="./" class="anchor-side-item"><div class="sidebar-item">dashboard</div></a>

            <div class="sidebar-divider">management</div>
            <a href="attendance.php" class="anchor-side-item"><div class="sidebar-item">attendance</div></a>
            <a href="payslip.php" class="anchor-side-item"><div class="sidebar-item">payslip</div></a>
            <a href="payroll.php" class="anchor-side-item"><div class="sidebar-item">payroll</div></a>

            <div class="sidebar-divider">requests</div>
            <a href="certificates.php" class="anchor-side-item"><div class="sidebar-item">certificates</div></a>
            <a href="leave.php" class="anchor-side-item"><div class="sidebar-item">leave</div></a>
        </div>
        <!-- ==================== Sidebar phone end ====================-->


        <!-- ==================== Mainbar ====================-->
        <div class="main-right" id="mainbar">
            <p class="page-title">dashboard</p>
        </div>
        <!-- ==================== Mainbar end ====================-->
    </main>
    <!-- ==================== Main end ====================-->


<!-- ==================== Script tag ====================-->
<script src="js/side-bar-phone.js"></script>
<script src="js/sidebar-phone.js"></script>
<!-- ==================== Script tag end ====================-->
</body>
</html>
<?php 
        } 
    }
?>