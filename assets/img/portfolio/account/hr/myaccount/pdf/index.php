<?php

include '../../../config.php';

use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';

if (isset($_GET['printid']) && isset($_GET['setid']) && isset($_GET['uniqid'])) {
	/*== Header image ==*/
	$img = file_get_contents('../img/header.png');
	$img = base64_encode($img);

	$sql = "SELECT * FROM employee WHERE id = '".$_GET['uniqid']."'";
	$res = mysqli_query($link, $sql);

	if (mysqli_num_rows($res) > 0) {
		while($fetch = mysqli_fetch_assoc($res)){
			$employee_name = $fetch['firstname'].' '.$fetch['middlename'].' '.$fetch['lastname'];
			$member_since = $fetch['member_since'];
			$job_position = $fetch['position'];
		}
	}

	$mysql = "SELECT * FROM certificate WHERE viewid = '".$_GET['uniqid']."'";
	$query = mysqli_query($link, $mysql);

	if (mysqli_num_rows($query) > 0) {
		while ($certificate = mysqli_fetch_assoc($query)) {
			/*== COE signature ==*/
			$coe_signature = file_get_contents($certificate['coe_signature']);
			$coe_signature = base64_encode($coe_signature);
			$coe_name = $certificate['coe_name'];
			$coe_position = $certificate['coe_position'];
			$coe_issueddate = $certificate['coe_issueddate'];
			$coe_issuedplace = $certificate['coe_issuedplace'];

			$cpa_permitno = $certificate['cpa_permitno'];
			$cpa_address = $certificate['cpa_address'];
			$cpa_contractor = $certificate['cpa_contractor'];
			$cpa_issued = $certificate['cpa_issued'];
			$cpa_issuedto = $certificate['cpa_issuedto'];
			$cpa_expires = $certificate['cpa_expires'];
			$cpa_description = $certificate['cpa_descriptionofwork'];
			$cpa_staffcomments = $certificate['cpa_staffcomments'];
			$cpa_emergencycontactno = $certificate['cpa_emergencycontactno'];
			$cpa_commisionerofbuildings = file_get_contents($certificate['cpa_contractorsignature']);
			$cpa_commisionerofbuildings = base64_encode($cpa_commisionerofbuildings);
			$cpa_contractorsignature = file_get_contents($certificate['cpa_commisionerofbuildingssignature']);
			$cpa_contractorsignature = base64_encode($cpa_contractorsignature);
			$cpa_administrativemanagersignature = file_get_contents($certificate['cpa_administrativemanagersignature']);
			$cpa_administrativemanagersignature = base64_encode($cpa_administrativemanagersignature);
			$cpa_assignedengineersignature = file_get_contents($certificate['cpa_assignedengineersignature']);
			$cpa_assignedengineersignature = base64_encode($cpa_assignedengineersignature);

			$rl_durationofwork = $certificate['rl_durationofwork'];
			$rl_stateskills = $certificate['rl_stateskills'];
			$rl_personalbehaviour = $certificate['rl_personalbehaviour'];
			$rl_targetcompany = $certificate['rl_targetcompany'];
			$rl_detailedskills = $certificate['rl_detailedskills'];
			$rl_signature = file_get_contents($certificate['rl_signature']);
			$rl_signature = base64_encode($rl_signature);

			$cf_project = $certificate['cf_project'];
			$cf_pcp = $certificate['cf_pcp'];
			$cf_pcn = $certificate['cf_pcn'];
			$cf_pe = $certificate['cf_pe'];
			$cf_notc = $certificate['cf_notc'];
			$cf_ccp = $certificate['cf_ccp'];
			$cf_ccn = $certificate['cf_ccn'];
			$cf_ce = $certificate['cf_ce'];
			$nscw_one = $certificate['nscw_one'];
			$nscw_onec = $certificate['nscw_onec'];
			$nscw_two = $certificate['nscw_two'];
			$nscw_twoc = $certificate['nscw_twoc'];
			$nscw_three = $certificate['nscw_three'];
			$nscw_threec = $certificate['nscw_threec'];
			$nscw_four = $certificate['nscw_four'];
			$nscw_fourc = $certificate['nscw_fourc'];
			$nscw_five = $certificate['nscw_five'];
			$nscw_fivec = $certificate['nscw_fivec'];
			$sw_one = $certificate['sw_one'];
			$sw_oned = $certificate['sw_oned'];
			$sw_two = $certificate['sw_two'];
			$sw_twod = $certificate['sw_twod'];
			$sw_three = $certificate['sw_three'];
			$sw_threed = $certificate['sw_threed'];
			$sw_four = $certificate['sw_four'];
			$sw_fourd = $certificate['sw_fourd'];
			$sw_five = $certificate['sw_five'];
			$sw_fived = $certificate['sw_fived'];
			$spn_one = file_get_contents($certificate['spn_one']);
			$spn_one = base64_encode($spn_one);
			$spn_two = file_get_contents($certificate['spn_two']);
			$spn_two = base64_encode($spn_two);
			$spn_onen = $certificate['spn_onen'];
			$spn_twon = $certificate['spn_twon'];
		}
	}

	$page = '

	<!DOCTYPE html>
	<html>
		<head>
			<title>Print {name} Certificate</title>
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
				table{
					width: 80%;
					margin: auto;
					margin-top: 15px;
				}
				th{
					text-align: left;
				}
				.divider{
					height: 0;
					width: 100%;
					margin: auto;
					border: 1px solid black;
				}
				h6{
					text-align: center;
				}
				.title-div{
					background-color: #c0c0c0;
					font-weight: bolder;
					text-align: center;
				}
			</style>
		</head>
		<body>
			<div class="box1">
			    <img src="data:image;base64,'.$img.'" class="header">
				<h1>certificate of employment</h1>
				<div class="description">
					<p>To whom it may concern:</p><br>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						This is to certify that <span style="text-transform: capitalize;">'.$employee_name.'</span> is an employee of Unionworks
						Construction Industries Company Ltd. From '.$member_since.' to up to present '.date('Y').'. He is
						currently working as a <span style="text-transform: capitalize;">'.$job_position.'</span> of our Present Project.<br><br>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						This certification is issued upon the request of the afore-mentioned party for any legal purposes.<br><br>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Issued this '.$coe_issueddate.' at  <span style="text-transform: capitalize;">'.$coe_issuedplace.'</span>.<br><br><br><br><br>

						Signed by:
					</p>
					<img src="data:image;base64,'.$coe_signature.'" class="ad-signature">
					<p class="name"><span style="text-transform: capitalize;">'.$coe_name.'</span></p>
					<p><span style="text-transform: capitalize;">'.$coe_position.'</span></p><br><br><br><br><br>

					<p class="center">19 Barasoain St., Brgy. Little Baguio San Juan City</p>
					<p class="center">Telefax : 8350-4065</p>
					<p class="center">EMAIL : unionworksindustries@gmail.com / unionworksconstruction@gmail.com</p>
				</div>
			</div>

			<div class="box2">
			    <img src="data:image;base64,'.$img.'" class="header">
				<h1>CONSTRUCTION PERMIT APPLICATIOn</h1>
				<table>
					<thead>
						<tr>
							<th><br>Permit No.: <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_permitno.'</span></th>
							<th><br>Issued: <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_address.'</span></th>
							<th><br>Expires: <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_expires.'</span></th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th><br>Address: <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_address.'</span></th>
							<th><br>Issued to: <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_issuedto.'</span></th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th><br>Contractor: <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_contractor.'</span></th>
						</tr>
					</thead>
				</table>
				<div class="description">
					<h4>Description of Work</h4>
					<i>'.nl2br($cpa_description).'</i><br><br>
					<h4>Staff Comments</h4>
					<p>'.nl2br($cpa_staffcomments).'</p><br>
					<div class="divider"></div><br>
					<h4>Emergency Contact No. <span style="text-transform: capitalize; font-weight: normal;">'.$cpa_emergencycontactno.'</span></h4>
				</div>
				<table>
					<thead>
						<tr>
							<th><br>
								<img src="data:image;base64,'.$cpa_contractorsignature.'" class="ad-signature"><br>
								Contractor
							</th>
							<th><br>
								<img src="data:image;base64,'.$cpa_administrativemanagersignature.'" class="ad-signature"><br>
								Administrative Manager
							</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th><br>
								<img src="data:image;base64,'.$cpa_commisionerofbuildings.'" class="ad-signature"><br>
								Commissioner of Buildings
							</th>
							<th><br>
								<img src="data:image;base64,'.$cpa_assignedengineersignature.'" class="ad-signature"><br>
								Assigned Engineer
							</th>
						</tr>
					</thead>
				</table><br>
				<h6>
					*Tampering with or knowingly making falsely altering this permit is a crime that is punishable by a fine, imprisonment or both
				</h6><br>
				<p class="center">19 Barasoain St., Brgy. Little Baguio San Juan City</p>
				<p class="center">Telefax : 8350-4065</p>
				<p class="center">EMAIL : unionworksindustries@gmail.com / unionworksconstruction@gmail.com</p>
			</div>

			<div class="box2">
			    <img src=data:image;base64,'.$img.' class="header">
				<h1>RECOMMENDATION LETTER</h1>
				<div class="description">
					<p>
						'.date('M d, Y').'<br>
						Unionworks Construction Industries Company Inc.<br>
						19 Barasoain St., Brgy. Little Baguio San Juan City<br><br><br>

						To whom it may concern,<br><br>

						It is my pleasure and honor to commend <span style="text-transform: capitalize;">'.$employee_name.'</span> for the role of
						<span style="text-transform: capitalize;">'.$job_position.'</span> at Unionworks Construction Company Inc. I managed Mr./Mrs. <span style="text-transform: capitalize;">'.$employee_name.'</span>
						for '.$rl_durationofwork.' at Unionworks Construction Industries Company Ltd., where
						he/she demonstrated excellent '.$rl_stateskills.', professional experience and '.$rl_personalbehaviour.' will make his/her a powerful asset at '.$rl_targetcompany.'<br><br>

						As <span style="text-transform: capitalize;">'.$job_position.'</span>, he/she demonstrate '.$rl_detailedskills.'.<br><br>

						<span style="text-transform: capitalize;">'.$employee_name.'</span> has my highest recommendation for this position. I have no
						doubt they will make a strong addition to your team. Please feel free to contact me if
						you have any questions regarding <span style="text-transform: capitalize;">'.$employee_name.'</span> candidacy or past work.<br><br>

						Sincerely,<br><br>
						<img src="data:image;base64,'.$rl_signature.'" class="ad-signature"><br>
						Signature over printed name<br>
						Assigned HR Staff<br><br><br><br><br>
					</p>
					<p class="center">19 Barasoain St., Brgy. Little Baguio San Juan City</p>
					<p class="center">Telefax : 8350-4065</p>
					<p class="center">EMAIL : unionworksindustries@gmail.com / unionworksconstruction@gmail.com</p>
				</div>
			</div>

			<div class="box2">
			    <img src=data:image;base64,'.$img.' class="header">
				<h1>CLEARANCE FORM</h1>
				<div class="description">
					<p>
						Instruction: This form shall be duly accomplished and submitted
						by the <strong>MAIN CONTRACTOR</strong> in applying for an approval of a
						Construction Safety intended for a specific construction project.<br><br>

						<strong>Note: A checklist of requirements shall be used in receiving the
						form.</strong><br><br>

						Only an application form with a complete requirements will be
						processed. Form found with incomplete requirements will be given
						15 working days to comply. Failure to comply within the period,
						the application will be disapproved.
					</p><br><br>
					<div class="title-div">Company Profile</div><br>

					<table style="margin: 0;">
						<thead>
							<tr>
								<td><strong>Complete Name of the Company:</strong> Unionworks Construction Industries Company Ltd.</td>
								<td><strong>Complete Address:</strong> 19 Barasoain St., Brgy. Little Baguio San Juan City</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td></td>
								<td><strong>Telephone No.:</strong></td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td></td>
								<td><strong>Fax No.:</strong> Fax No: 8350-4065</td>
							</tr>
						</thead>
					</table><br>

					<div class="title-div">
						<p style="visibility: hidden;">
							a
						</p>
					</div><br>

					<table style="margin: 0;">
						<thead>
							<tr>
								<td><strong>Name of Project/Building:</strong> '.$cf_project.'</td>
								<td><strong>Contact Person:</strong> '.$cf_pcp.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td></td>
								<td><strong>Contact No:</strong> '.$cf_pcn.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td></td>
								<td><strong>Email:</strong> '.$cf_pe.'</td>
							</tr>
						</thead>
					</table><br>

					<div class="title-div">
						<p style="visibility: hidden;">
							a
						</p>
					</div><br>

					<table style="margin: 0;">
						<thead>
							<tr>
								<td><strong>Name of the Contractor:</strong> '.$cf_notc.'</td>
								<td><strong>Contact Person:</strong> '.$cf_ccp.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td></td>
								<td><strong>Contact No:</strong> '.$cf_ccn.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td></td>
								<td><strong>Email:</strong> '.$cf_ce.'</td>
							</tr>
						</thead>
					</table><br>

					<div class="title-div">Sub-Contractor/Workers Profile</div><br>

					<table style="margin: 0;">
						<thead>
							<tr>
								<th></th>
								<th style="text-align: center;">Name of Sub Contractor Worker</th>
								<th style="text-align: center;">Contact No</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>1</td>
								<td>'.$nscw_one.'</td>
								<td>'.$nscw_onec.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>2</td>
								<td>'.$nscw_two.'</td>
								<td>'.$nscw_twoc.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>3</td>
								<td>'.$nscw_three.'</td>
								<td>'.$nscw_threec.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>4</td>
								<td>'.$nscw_four.'</td>
								<td>'.$nscw_fourc.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>5</td>
								<td>'.$nscw_five.'</td>
								<td>'.$nscw_fivec.'</td>
							</tr>
						</thead>
					</table><br>

					<br><br><br><br><br><br><br><br>

					<div class="title-div">
						<p style="visibility: hidden;">
							a
						</p>
					</div><br>

					<table style="margin: 0;">
						<thead>
							<tr>
								<th></th>
								<th style="text-align: center;">Scope of Work</th>
								<th style="text-align: center;">Deadline</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>1</td>
								<td>'.$sw_one.'</td>
								<td>'.$sw_oned.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>2</td>
								<td>'.$sw_two.'</td>
								<td>'.$sw_twod.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>3</td>
								<td>'.$sw_three.'</td>
								<td>'.$sw_threed.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>4</td>
								<td>'.$sw_four.'</td>
								<td>'.$sw_fourd.'</td>
							</tr>
						</thead>
						<thead>
							<tr>
								<td>5</td>
								<td>'.$sw_five.'</td>
								<td>'.$sw_fived.'</td>
							</tr>
						</thead>
					</table><br>

					<img src="data:image;base64,'.$spn_one.'" class="ad-signature"><br>
					<p>Signature over Printed Name</p>
					<p class="name">'.$spn_onen.'</p><br><br>

					<img src="data:image;base64,'.$spn_two.'" class="ad-signature"><br>
					<p>Signature over Printed Name</p>
					<p class="name">'.$spn_twon.'</p><br><br>

					<br><br><br><br><br>
					<p class="center">19 Barasoain St., Brgy. Little Baguio San Juan City</p>
					<p class="center">Telefax : 8350-4065</p>
					<p class="center">EMAIL : unionworksindustries@gmail.com / unionworksconstruction@gmail.com</p>
				</div>
			</div>

		</body>
	</html>

	';

	$document = new Dompdf();

	$document->loadHtml($page);

	$document->setPaper('A4', 'portrait');

	$document->render();

	$document->stream("{name} Unionworks Construction Company Inc.", array("Attachment"=>0));
}
else{
	echo "ERROR! contact the developer";
}

?>