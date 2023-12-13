<!DOCTYPE html>
<html>
<head>
	<title>Print | {name}</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		html, body{
			height: 100%;
		}
		.box1, .box2{
			height: 99%;
			page-break-after: always;
		}
		h1{
			text-align: center;
			font-size: 1.5em;
			text-align: center;
			color: rgba(0,0,0,0.8);
			text-transform: uppercase;
			margin-top: 10px;
		}
		.description{
			width: 80%;
			margin: auto;
			margin-top: 30px;
		}
		.name{
			font-weight: bolder;
			text-transform: capitalize;
			font-size: 1.1em;
		}
		.center{
			text-align: center;
		}
		.header{
			width: 100%;
		}
		.ad-signature{
			height: 70px;
			width: 100px;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="box1">
	    
		<h1>certificate of employment</h1>
		<div class="description">
			<p>To whom it may concern:</p><br>
			<p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				This is to certify that (NAME OF THE EMPLOYEE) is an employee of Unionworks
				Construction Industries Company Ltd. From (DATE STARTED) to up to present ( 2021 ). He is
				currently working as a (JOB POSITION) of our Present Project.<br><br>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				This certification is issued upon the request of the afore-mentioned party for any legal purposes.<br><br>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Issued this (5th Day of August, 2021) at (San Juan City).<br><br><br><br><br>

				Signed by:
			</p>
			
			<p class="name">{name}</p>
			<p>{position}</p><br><br><br><br><br>

			<p class="center">19 Barasoain St., Brgy. Little Baguio San Juan City</p>
			<p class="center">Telefax : 8350-4065</p>
			<p class="center">EMAIL : unionworksindustries@gmail.com / unionworksconstruction@gmail.com</p>
		</div>
	</div>
</body>
</html>