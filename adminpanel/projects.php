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
	<title>Projects - CheapDevs PH</title>

	<!-- Favicons -->
  	<link href="../assets/img/favicon.png" rel="icon">
  	<link href="../assets/img/favicon.png" rel="apple-touch-icon">
  	<link rel="stylesheet" type="text/css" href="css/index.css">

  	<!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>

  <div id="modal">
    <form method="post" action="action/add-project.php" class="view-item form-item">
      <a href="#" onclick="showModal()" class="exit">✖</a>
      <label class="white">
        Project TItle<br>
      <input type="text" name="project_title" class="form-control-input" required="">
      </label><br><label class="white">
        Price<br>
      <input type="text" name="price" class="form-control-input" required="">
      </label><br><label class="white">
        Promo link<br>
      <input type="text" name="project_link" class="form-control-input" required="">
      </label><br><label class="white">
        Category<br>
        <select name="project_category" class="form-control-input" required="">
        	<option value="filter-website">Website</option>
        	<option value="filter-project">Project</option>
        	<option value="filter-crm">CRM</option>
        </select>
      </label><br>
      <button class="btn-update" name="post_project">Post</button>
    </form>
  </div>

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
				<div class="main-sub-menu active-menu">
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
			<h2>Projects</h2>

			<div class="table-div">
				<div class="table-div-flex">
					<?php
						$query = "SELECT COUNT(*) FROM projects";
						$s_query = mysqli_query($link, $query);

						if (mysqli_num_rows($s_query) > 0) {
							while ($count = mysqli_fetch_assoc($s_query)) {
					?>
					<div class="table-div-flex-left"><span class="blue"><?php echo $count['COUNT(*)']?></span> total projects</div>
					<?php
							}
						}
						else{
					?>
					<div class="table-div-flex-left"><span class="blue"></span> No projects</div>
					<?php
						}
					?>
					<div class="table-div-flex-right">
						<a href="#" onclick="showModal()" class="btn-add">Create Project</a>
						<input type="text" name="search" class="form-control-search" placeholder="Search" id="myInput" autocomplete="off" onkeyup="myFunction()">
					</div>
				</div>

				<table id="myTable">
					<thead>
						<tr>
							<th>Image</th>
							<th>Title</th>
							<th>Date</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM projects ORDER BY id DESC";
							$res = mysqli_query($link, $sql);

							if (mysqli_num_rows($res) > 0) {
								while ($result = mysqli_fetch_assoc($res)) {
						?>
						<tr>
							<?php
								if ($result['image'] == "") {
									echo '<td>No image yet</td>';
								}
								else{
									echo '<td><img src="../uploads/'.$result['image'].'" class="td-image"></td>';
								}
							?>
							<td><?php echo $result['project_title']?></td>
							<td><?php echo $result['project_date']?></td>
							<td>₱ <?php echo number_format($result['price'], 2)?></td>
							<td>
								<a href="view-project?id=<?php echo $result['id']?>&title=<?php echo $result['project_title']?>" class="btn-view">View</a>
								<a href="action/delete-project.php?id=<?php echo $result['id']?>" class="btn-delete">Delete</a>
							</td>
						</tr>
						<?php
								}
							}
							else{
								echo "No project";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</main>

<script src="js/search-title.js"></script>
<script src="js/showModal.js"></script>
</body>
</html>