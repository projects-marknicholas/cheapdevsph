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
	<title>Dashboard - CheapDevs PH</title>

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
				<div class="main-sub-menu active-menu">
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
			<h2>Dashboard</h2>

			<div class="grid-4">
				<div class="grid-item">
					<p>Total Revenue</p>
					<?php
						$query1 = "SELECT SUM(price) as revenue FROM projects";
						$s_query1 = mysqli_query($link, $query1);

						if (mysqli_num_rows($s_query1) > 0) {
							while ($count1 = mysqli_fetch_assoc($s_query1)) {
								if ($count1['revenue'] == "") {
									echo "<h2>0</h2>";
								}
								else{
									echo "<h2>".number_format($count1['revenue'], 2)."</h2>";
								}
							}
						}
						else{
							echo "<h2>0</h2>";
						}
					?>			
				</div>
				<div class="grid-item">
					<p>Total projects</p>
					<?php
						$query2 = "SELECT COUNT(*) FROM projects";
						$s_query2 = mysqli_query($link, $query2);

						if (mysqli_num_rows($s_query2) > 0) {
							while ($count2 = mysqli_fetch_assoc($s_query2)) {
								echo "<h2>".$count2['COUNT(*)']."</h2>";
							}
						}
						else{
							echo "<h2>0</h2>";
						}
					?>
				</div>
				<div class="grid-item">
					<p>Total Subscriptions</p>
					<?php
						$query3 = "SELECT COUNT(*) FROM subscription";
						$s_query3 = mysqli_query($link, $query3);

						if (mysqli_num_rows($s_query3) > 0) {
							while ($count3 = mysqli_fetch_assoc($s_query3)) {
								echo "<h2>".$count3['COUNT(*)']."</h2>";
							}
						}
						else{
							echo "<h2>0</h2>";
						}
					?>
				</div>
				<div class="grid-item">
					<p>Total Accounts</p>
					<?php
						$query4 = "SELECT COUNT(*) FROM users";
						$s_query4 = mysqli_query($link, $query4);

						if (mysqli_num_rows($s_query4) > 0) {
							while ($count4 = mysqli_fetch_assoc($s_query4)) {
								echo "<h2>".$count4['COUNT(*)']."</h2>";
							}
						}
						else{
							echo "<h2>0</h2>";
						}
					?>
				</div>
			</div>

			<div class="grid-2">
				<div class="grid-item">
					<canvas id="yearlyRevenue"></canvas>
				</div>
				<div class="grid-item">
					<canvas id="monthlyRevenue"></canvas>
				</div>
			</div>

			<div class="table-div" style="margin-top: 20px;">
				<div class="table-div-flex">
					<?php
						$query = "SELECT COUNT(*) FROM messages WHERE status = 'pending'";
						$s_query = mysqli_query($link, $query);

						if (mysqli_num_rows($s_query) > 0) {
							while ($count = mysqli_fetch_assoc($s_query)) {
					?>
					<div class="table-div-flex-left"><span class="blue"><?php echo $count['COUNT(*)']?></span> pending messages</div>
					<?php
							}
						}
						else{
					?>
					<div class="table-div-flex-left"><span class="blue"></span> No pending messages</div>
					<?php
						}
					?>
					&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<?php
						$query = "SELECT COUNT(*) FROM messages";
						$s_query = mysqli_query($link, $query);

						if (mysqli_num_rows($s_query) > 0) {
							while ($count = mysqli_fetch_assoc($s_query)) {
					?>
					<div class="table-div-flex-left"><span class="blue"><?php echo $count['COUNT(*)']?></span> total messages</div>
					<?php
							}
						}
						else{
					?>
					<div class="table-div-flex-left"><span class="blue"></span> No messages</div>
					<?php
						}
					?>
					<div class="table-div-flex-right">
						<input type="text" name="search" class="form-control-search" placeholder="Search" autocomplete="off" id="myInput" onkeyup="myFunction()">
					</div>
				</div>

				<table id="myTable">
					<thead>
						<tr>
							<th>Date</th>
							<th>Name</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM messages ORDER BY id DESC";
							$res = mysqli_query($link, $sql);

							if (mysqli_num_rows($res) > 0) {
								while ($result = mysqli_fetch_assoc($res)) {
						?>
						<tr>
							<td><?php echo $result['email_date']?></td>
							<td><?php echo $result['name']?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $result['subject']?></td>
							<td class="<?php echo $result['status']?>"><?php echo $result['status']?></td>
							<td>
								<a href="view-messages?id=<?php echo $result['id']?>&title=<?php echo $result['name']?>" class="btn-view">View</a>
								<a href="action/delete-messages.php?id=<?php echo $result['id']?>" class="btn-delete">Delete</a>
							</td>
						</tr>
						<?php
								}
							}
							else{
								echo "No blogs";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</main>

<script>
	const labels = [
		<?php
			$calculate_sales_sql = "SELECT YEAR(project_time) as total, sum(price) as total_sales FROM projects GROUP BY YEAR(project_time)";
			$calculate_sales_res = mysqli_query($link, $calculate_sales_sql);

			if (mysqli_num_rows($calculate_sales_res) > 0) {
				while ($calculate_sales = mysqli_fetch_assoc($calculate_sales_res)){
		?>
		'<?php echo $calculate_sales["total"]?>',
		<?php
				}
			}
		?>
      ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Yearly Revenue',
      backgroundColor: ['#185ca4'],
      data: [
      <?php
			$calculate_sales_sql = "SELECT YEAR(project_time) as total, sum(price) as total_sales FROM projects GROUP BY YEAR(project_time)";
			$calculate_sales_res = mysqli_query($link, $calculate_sales_sql);

			if (mysqli_num_rows($calculate_sales_res) > 0) {
				while ($calculate_sales = mysqli_fetch_assoc($calculate_sales_res)){
		?>
		'<?php echo $calculate_sales["total_sales"]?>',
		<?php
				}
			}
		?>
      ],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('yearlyRevenue'),
    config
  );
</script>
<script>
	const newlabels = [
		<?php
			$calculate_sales_sql = "SELECT MONTHNAME(project_time) as total, sum(price) as total_sales FROM projects GROUP BY MONTH(project_time)";
			$calculate_sales_res = mysqli_query($link, $calculate_sales_sql);

			if (mysqli_num_rows($calculate_sales_res) > 0) {
				while ($calculate_sales = mysqli_fetch_assoc($calculate_sales_res)){
		?>
		'<?php echo $calculate_sales["total"]?>',
		<?php
				}
			}
		?>
      ];

  const newdata = {
    labels: newlabels,
    datasets: [{
      label: 'Monthly Revenue',
      backgroundColor: ['#185ca4'],
      data: [
      <?php
			$calculate_sales_sql = "SELECT MONTHNAME(project_time) as total, sum(price) as total_sales FROM projects GROUP BY MONTH(project_time)";
			$calculate_sales_res = mysqli_query($link, $calculate_sales_sql);

			if (mysqli_num_rows($calculate_sales_res) > 0) {
				while ($calculate_sales = mysqli_fetch_assoc($calculate_sales_res)){
		?>
		'<?php echo $calculate_sales["total_sales"]?>',
		<?php
				}
			}
		?>
      ],
    }]
  };

  const newconfig = {
    type: 'line',
    data: newdata,
    options: {}
  };

  const newChart = new Chart(
    document.getElementById('monthlyRevenue'),
    newconfig
  );


	 
</script>
<script src="js/search-title.js"></script>
</body>
</html>