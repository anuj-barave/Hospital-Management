<html>
<head>
<title>Admin home</title>
<style>
*{
	font-family: Tahoma, sans-serif;
	autofill:off;
}
.bdiv{
	background-color:rgb(0,51,102);
	height:50px;
	margin-top:15px;
	width:100%;
}
button.cb{
	background-color:rgb(0, 102, 204);
	color:white;
	padding:5px;
	font-size:20px;
	border-radius:10px;
	padding:5px;
	float:right;
	margin-top:25px;
	margin-right:50px;
	cursor:pointer;
}
button.cb:hover{
	transition:0.2s;
	background-color:rgb(0,51,102);
	font-size:30px;
}
button.ab{
	background-color:transparent;
	float:right;
	border:none;
	color:white;
	font-size:20px;
	margin:10px;
	cursor:pointer;
}
button.ab:hover{
	transition:0.2s;
	margin-top:5px;
	margin-bottom:5px;
	font-size:30px;
}
img.sb{
	margin-left:150px;
	margin-top:10px;
	margin-bottom:10px;
	width:250px;
	height:30px;
}
img.sb:hover{
	transition:0.2s;
	width:300px;
	height:40px;
	margin-top:5px;
	margin-bottom:5px;
}
.mdiv{
	margin-top:0px;
	background-color:rgb(153, 204, 255);
	width:300px;
	height:502px;
	float:left;
	text-align:center;
	float:left;
}
button.mbutton{
	color:white;
	background-color:rgb(0,51,102);
	font-size:20px;
	margin-top:40px;
	padding:10px 15px 10px 15px;
	border-radius:25px;
	cursor:pointer;
}
button.mbutton:hover{
	transition:0.2s;
	font-size:25px;
}
button.operation{
	background-color:rgba(192,192,192,0.3);
	font-size:20px;
	border-left:solid black;
	border-right:solid black;
	border-top:none;
	border-bottom:none;
	border-width:1px;
	padding:5px;
	outline:none;
	cursor:pointer;
}
button.operation:hover{
	transition:0.2s;
	background-color:rgba(192,192,192,0.8);
}
table, td {
  border: 3px solid black;
  border-collapse: collapse;
  padding:3px;
  overflow:auto;
}
th{
	border:3px solid black;
	background-color:#d6d6c2;
}
.error {color: #FF0000; font-size:20px}
</style>
</head>

<body>

<a href="http://localhost/Mini%20project/admin%20home.php">
	<img src="http://localhost/Mini project/logo.png" width="300" height="80">
</a>

<button type="button" onclick="toLogout()" class="cb">Logout</button>

<div class="bdiv">
<button type="button" onclick="toHome()" class="ab" style="float:left;margin-left:20px">Home</button>
<img src="http://localhost/Minor project/searchbar.png" class="sb">
<button type="button" onclick="toDoctorInfo()" class="ab" style="margin-right:15px">Doctors' Info</button>
<button type="button" onclick="toFeedbackList()" class="ab">Feedback List</button>
</div>

<div style="float:right;margin-top:20px;margin-right:8px">
<form action="" method="POST">
	<label for="sort_by" style="font-size:18px"><b>Order By: </b></label>
		<select name="sort_y" id="sort_by" style="font-size:16px">
		<option value="pid">Patient ID</option>
		<option value="name">Name</option>
		<option value="doa">D.O.A</option>
		<option value="type">Type</option>
		<option value="dis">Discharged</option>
		<option value="noup">Not updated</option>
		</select>	
	<br><br>
	<input type="submit" style="margin-left:60px;cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px" value="Sort" name="sort_button"></input>
</form>	
</div>

<div style="width:1130px;height:300px;font-size:20px;overflow:auto">	
<?php
	$msg='';
	$msg_del_irr='';
	$msg_up='';
	$msg_add='';
	if(isset($_POST["sort_button"])){
		$conn = oci_connect('system', 'yash', 'XE');
		$orderop=$_POST["sort_y"];
		$sql='';
		if($orderop=="pid"){
			$sql='SELECT * FROM patient ORDER BY pid';
		}
		else if($orderop=="name"){
			$sql='SELECT * FROM patient ORDER BY name';
		}
		else if($orderop=="doa"){
			$sql='SELECT * FROM patient ORDER BY date_of_appointment';
		}
		else if($orderop=="type"){
			$sql='SELECT * FROM patient ORDER BY type';
		}
		else if($orderop=="dis"){
			$sql='SELECT * FROM patient ORDER BY discharged';
		}
		else if($orderop=="noup"){
			$sql='SELECT * FROM patient WHERE doctors_assigned IS NULL';
		}
		echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
			$result = oci_parse($conn,$sql);
				oci_execute($result);
				$i=1;
				while (($row = oci_fetch_assoc($result)) != false) {
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $row['DATE_OF_APPOINTMENT'] ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
		oci_close($conn);
		
	}
	else if(isset($_POST["search_submit"])){
		$name=$_POST["name_search"];
		echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
				$conn = oci_connect('system', 'yash', 'XE');
				$stid = oci_parse($conn, "SELECT * FROM patient WHERE name='$name'");
				oci_execute($stid);
				$i=1;
				while (($row = oci_fetch_assoc($stid)) != false) {
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $row['DATE_OF_APPOINTMENT'] ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
				oci_free_statement($stid);
				oci_close($conn);
	}
	else if(isset($_POST["d_manual"])){
		$id=$_POST["manual_d"];
		$conn=oci_connect("system","yash","XE");
		$check="SELECT * FROM patient WHERE pid='$id'";
		$sql = "DELETE FROM patient WHERE pid='$id'";
		$result=oci_parse($conn,$check);	
		oci_execute($result);
		if(oci_fetch_assoc($result)==true){
			$final=oci_parse($conn,$sql);
			oci_execute($final);
			$msg='Entry for provided Patient ID successfully deleted!';
		}
		else{
			$msg='No entry for provided Patient ID exists!';
		}
		echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
			$stid = oci_parse($conn, 'SELECT * FROM patient');
				oci_execute($stid);
				$i=1;
				while (($row = oci_fetch_assoc($stid)) != false) {
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $row['DATE_OF_APPOINTMENT'] ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
		oci_close($conn);
	}
	else if(isset($_POST["d_irr_entries"])){
		$msg_del_irr='Irrelevant entries successfully deleted!';
		$today=strtotime("today");
		$today=date("Y-m-d", $today);
		$today=$today.'';
		$conn=oci_connect("system","yash","XE");
		$sql = "DELETE FROM patient WHERE (date_of_appointment<'$today' AND type IS NULL) OR (discharged='Y')";
		$result=oci_parse($conn,$sql);	
		oci_execute($result);
		echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
		$stid = oci_parse($conn, 'SELECT * FROM patient');
				oci_execute($stid);
				$i=1;
				while (($row = oci_fetch_assoc($stid)) != false) {
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $row['DATE_OF_APPOINTMENT'] ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
		oci_close($conn);
	}
	else if(isset($_POST["update_up"])){
		$pid=$_POST["up_id"];
		$type=$_POST["up_options"];
		$doc_id=$_POST["doc_id_up"];
		$disease=$_POST["dis_up"];
		$billing=$_POST["bill_up"];
		$dis=$_POST["dis"];
		$doc_name='';
		$doc_dep='';
		$doc_before_up='';
		
		$conn = oci_connect('system', 'yash', 'XE');
		$check="SELECT * FROM patient where pid='$pid'";
		$res=oci_parse($conn,$check);
		oci_execute($res);
		if(($rowa=oci_fetch_assoc($res))==true){
			$doc_before_up=$rowa['DOCTORS_ASSIGNED'];
			if(!empty($doc_id)){
				$check_doc="SELECT * FROM doctor WHERE doc_id='$doc_id'";
				$res_doc=oci_parse($conn,$check_doc);
				oci_execute($res_doc);
				if(($row=oci_fetch_assoc($res_doc))==true){
					$doc_name=$row['DOC_NAME'];
					$doc_dep=$row['DEP_NAME'];
					$sql="UPDATE patient SET doctors_assigned='$doc_name',departments='$doc_dep' WHERE pid='$pid'";
					$res_doc_up=oci_parse($conn,$sql);
					oci_execute($res_doc_up);
				}
				else{
					$msg_up='No doctor with provided Doctor ID exisis!';
				}
			}
			if(!empty($disease)){
				$sql_dis="UPDATE patient SET DISEASES='$disease' WHERE pid='$pid'";
				$res_dis=oci_parse($conn,$sql_dis);
				oci_execute($res_dis);
			}
			if(!empty($billing)){
				$sql_billing="UPDATE patient SET BILLING='$billing' WHERE pid='$pid'";
				$res_billing=oci_parse($conn,$sql_billing);
				oci_execute($res_billing);
			}
			if($type!="no"){
				$sql_type="UPDATE patient SET TYPE='$type' WHERE pid='$pid'";
				$res_type=oci_parse($conn,$sql_type);
				oci_execute($res_type);
			}
			if($dis!="no"){
				$sql_disch="UPDATE patient SET DISCHARGED='$dis' WHERE pid='$pid'";
				$res_disch=oci_parse($conn,$sql_disch);
				oci_execute($res_disch);
			}
			echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
			$stid = oci_parse($conn, "SELECT * FROM patient WHERE pid='$pid'");
				oci_execute($stid);
				$i=1;
				$mail_user='';
				$username='';
				$date_app='';
				while (($row = oci_fetch_assoc($stid)) != false) {
					$mail_user=$row['EMAIL'];
					$username=$row['NAME'];
					$date_app=$row['DATE_OF_APPOINTMENT'];
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $username ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $mail_user ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $date_app ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
				oci_free_statement($stid);
				oci_close($conn);
			if(empty($doc_before_up) && !empty($doc_id)){	
			$to = $mail_user;
			$subject = 'Appointment at Aster Hospital';
			$message = 'Hello '.$username.'! 
Your appointment at Aster Hospital has been confirmed! Doctor assigned to you is '. $doc_name .' and department alloted is '. $doc_dep .'. You can visit the hospital anytime on '. $date_app .' between 10 a.m. to 7 p.m. Appointment will be on first come, first serve basis or will be according to severity of patient. Appointment fees of Rs. 150/- will be applicable. If you are unable to visit, your appointment will be automatically cancelled.';
			$headers = 'From: dyash317@gmail.com';
			mail($to, $subject, $message, $headers);
			}
		}
		else{
			$msg_up='No patient exists with provided Patient ID!';
		}
	}
	else if(isset($_POST["update_add"])){
		$pid=$_POST["upon_id"];
		$doc_id=$_POST["doc_id_add"];
		$disease=$_POST["dis_add"];
		$dis_temp='';
		
		$conn = oci_connect('system', 'yash', 'XE');
		$check="SELECT * FROM patient where pid='$pid'";
		$res=oci_parse($conn,$check);
		oci_execute($res);
		if(($row1=oci_fetch_assoc($res))==true){
			$dis_temp=$row1['DISEASES'];
			$check_doc="SELECT * FROM doctor WHERE doc_id='$doc_id'";
			$res_doc=oci_parse($conn,$check_doc);
			oci_execute($res_doc);
			if(($row=oci_fetch_assoc($res_doc))==true){
				$doc_name=$row1['DOCTORS_ASSIGNED'];
				$doc_dep=$row1['DEPARTMENTS'];
				$doc_name=$doc_name.', '.$row['DOC_NAME'];
				$doc_dep=$doc_dep.', '.$row['DEP_NAME'];
				$disease=$dis_temp.' ,'.$disease;
				$sql="UPDATE patient SET doctors_assigned='$doc_name',departments='$doc_dep',diseases='$disease' WHERE pid='$pid'";
				$res_doc_up=oci_parse($conn,$sql);
				oci_execute($res_doc_up);
				echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
			$stid = oci_parse($conn, "SELECT * FROM patient WHERE pid='$pid'");
				oci_execute($stid);
				$i=1;
				while (($row = oci_fetch_assoc($stid)) != false) {
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $row['DATE_OF_APPOINTMENT'] ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
				oci_free_statement($stid);
				oci_close($conn);
			}
			else{
				$msg_add='No doctor with provided Doctor ID exisis!';
			}
		}
		else{
			$msg_add='No entry with provided Patient ID exists!';
		}
	}
	else{
			echo '<table style="width:1110px;font-size:20px">';
			echo "<tr>";
				echo "<th>Patient ID</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Gender</th>";
				echo "<th>Email</th>";
				echo "<th>Contact No.</th>";
				echo "<th>Date of appointment</th>";
				echo "<th>Desription</th>";
				echo "<th>Type</th>";
				echo "<th>Doctors assigned</th>";
				echo "<th>Departments</th>";
				echo "<th>Diseases</th>";
				echo "<th>Billing</th>";
				echo "<th>Discharged</th>";
			echo "</tr>";
				$conn = oci_connect('system', 'yash', 'XE');
				$stid = oci_parse($conn, 'SELECT * FROM patient');
				oci_execute($stid);
				$i=1;
				while (($row = oci_fetch_assoc($stid)) != false) {
					echo "<tr>";
					echo "<td>", $row['PID'] ,"</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['AGE'] ,"</td>";
					echo "<td>", $row['GENDER'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['CONTACT_NO'] ,"</td>";
					echo "<td>", $row['DATE_OF_APPOINTMENT'] ,"</td>";
					echo "<td>", $row['DESCRIPTION'] ,"</td>";
					echo "<td>", $row['TYPE'] ,"</td>";
					echo "<td>", $row['DOCTORS_ASSIGNED'] ,"</td>";
					echo "<td>", $row['DEPARTMENTS'] ,"</td>";
					echo "<td>", $row['DISEASES'] ,"</td>";
					echo "<td>", $row['BILLING'] ,"</td>";
					echo "<td>", $row['DISCHARGED'] ,"</td>";
					echo "</tr>";
					$i++;
				}
				oci_free_statement($stid);
				oci_close($conn);
	}
?>
</div>
<div style="height:196px;position:fixed;bottom:0px;width:100%">
<div style="display:grid;align-content:center;grid-auto-flow:column;">
<button type="button" id="search_button" onclick="search()" class="operation">Search</button>
<button type="button" id="manual" onclick="manual_delete()" class="operation">Manual Delete</button>
<button type="button" id="delete_b" onclick="delete_irr()" class="operation">Delete Irrelevant Entries</button>
<button type="button" id="update_b" onclick="update()" class="operation">Update</button>
<button type="button" id="add_b" onclick="add_on()" class="operation">Add On Update</button>
</div>

<div id="div_s" style="height:165px;display:none">
<br>
<span style="margin-left:30px;font-size:20px">Enter the name of patient to find his/her entry.</span><br><br>
<form action="" method="POST" autocomplete="off">
<input type="text" name="name_search" style="outline:none;border:none;border-bottom:3px solid black;margin-left:30px;height:40px;font-size:20px" placeholder="Enter name of patient" required></input>
<input type="submit" style="margin-left:10px;cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px" name="search_submit" value="Search"></input>
</form>
</div>

<div id="div_manual" style="height:165px;display:none">
<br>
<span style="margin-left:30px;font-size:20px">Enter the Patient Id of the patient to remove his/her entry.</span><br><br>
<form action="" method="POST" autocomplete="off">
<input type="number" name="manual_d" style="outline:none;border:none;border-bottom:3px solid black;margin-left:30px;height:40px;font-size:20px;width:260px" placeholder="Enter Patient Id of patient" required></input>
<input type="submit" style="margin-left:10px;cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px" name="d_manual" value="Delete"></input>
<span class="error" style="margin-left:20px"><?php echo '  '.$msg.'';?></span>
</form>
</div>

<div id="div_irr" style="height:165px;display:none">
<br>
<span style="margin-left:30px;font-size:20px">Using this option will delete all the older as well as discharged entries of patients.</span><br><br>
<form action="" method="POST">
<input type="submit" style="margin-left:30px;cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px" name="d_irr_entries" value="Delete Irrelevant Entries"></input>
<span class="error" style="margin-left:20px"><?php echo '  '.$msg_del_irr.'';?></span>
</form>
</div>

<div id="div_update" style="height:165px;display:none;overflow:auto">
<br>
<span style="margin-left:10px;font-size:20px">Fill the options you want to update for required patient.</span><br>
<form action="" method="POST" autocomplete="off">
<input type="number" name="up_id" style="outline:none;margin-left:10px;height:40px;font-size:20px;width:110px;border:none;border-bottom:3px solid red" placeholder="Patient ID" required></input>
<label for="up_options" style="margin-left:30px;font-size:20px">Type: </label>
		<select name="up_options" id="up_options" style="font-size:20px">
		<option value="no">No change</option>
		<option value="Admitted">Admitted</option>
		<option value="OPD">OPD</option>
		</select>
<input type="number" name="doc_id_up" maxlength="3" placeholder="Doctor's ID" style="outline:none;border:none;border-bottom:3px solid black;margin-left:20px;height:40px;font-size:20px;width:120px"></input>	
<input type="text"  name="dis_up" placeholder="Disease" style="outline:none;border:none;border-bottom:3px solid black;margin-left:20px;height:40px;font-size:20px"></input>	
<input type="number" name="bill_up" placeholder="Billing" style="outline:none;margin-left:20px;border:none;border-bottom:3px solid black;height:40px;font-size:20px;width:100px"></input>
<label for="dis" style="margin-left:10px;font-size:20px">Discharge Status: </label>
		<select name="dis" id="dis" style="font-size:20px">
		<option value="no">No change</option>
		<option value="Y">Yes</option>
		<option value="N">No</option>
		</select>
<input type="submit" style="margin-left:30px;cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px" name="update_up" value="Update"></input>		
</form>
<span style="margin-left:10px" class="error"><?php echo $msg_up ?></span>
</div>

<div id="div_add" style="height:165px;display:none">
<br>
<span style="margin-left:10px;font-size:20px">This option adds values to the provided inputs.</span>
<form action="" method="POST" autocomplete="off">
<input type="number" name="upon_id" style="outline:none;margin-left:10px;height:40px;font-size:20px;width:110px;border:none;border-bottom:3px solid red" placeholder="Patient ID" required></input>
<input type="number" name="doc_id_add" maxlength="3" placeholder="Doctor's ID" style="outline:none;border:none;border-bottom:3px solid black;margin-left:20px;height:40px;font-size:20px;width:120px" required></input>
<input type="text"  name="dis_add" placeholder="Disease" style="outline:none;border:none;border-bottom:3px solid black;margin-left:20px;height:40px;font-size:20px" required></input>
<input type="submit" style="margin-left:30px;cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px" name="update_add" value="Add values"></input>	
</form>
<span style="margin-left:10px" class="error"><?php echo $msg_add ?></span>
</div>		

</div>

<script>
	function toHome(){
		location.replace("http://localhost/Mini%20project/admin%20home.php")
	}
	function toDoctorInfo(){
		location.replace("http://localhost/Mini%20project/doctorsinfoadmin.php");
	}
	function toFeedbackList(){
		location.replace("http://localhost/Mini%20project/feedback%20list.php");
	}
	function toLogout(){
		location.replace("http://localhost/Mini%20project/home%20page.php");
	}
	function search(){
		document.getElementById("search_button").style.borderBottom="5px solid #ff6666";
		document.getElementById("manual").style.borderBottom="none";
		document.getElementById("delete_b").style.borderBottom="none";
		document.getElementById("update_b").style.borderBottom="none";
		document.getElementById("add_b").style.borderBottom="none";
		
		document.getElementById("div_s").style.display="block";
		document.getElementById("div_manual").style.display="none";
		document.getElementById("div_irr").style.display="none";
		document.getElementById("div_update").style.display="none";
		document.getElementById("div_add").style.display="none";
	}
	function manual_delete(){
		document.getElementById("search_button").style.borderBottom="none";
		document.getElementById("manual").style.borderBottom="5px solid #ff6666";
		document.getElementById("delete_b").style.borderBottom="none";
		document.getElementById("update_b").style.borderBottom="none";
		document.getElementById("add_b").style.borderBottom="none";
		
		document.getElementById("div_s").style.display="none";
		document.getElementById("div_manual").style.display="block";
		document.getElementById("div_irr").style.display="none";
		document.getElementById("div_update").style.display="none";
		document.getElementById("div_add").style.display="none";
	}
	function delete_irr(){
		document.getElementById("search_button").style.borderBottom="none";
		document.getElementById("manual").style.borderBottom="none";
		document.getElementById("delete_b").style.borderBottom="5px solid #ff6666";
		document.getElementById("update_b").style.borderBottom="none";
		document.getElementById("add_b").style.borderBottom="none";
		
		document.getElementById("div_s").style.display="none";
		document.getElementById("div_manual").style.display="none";
		document.getElementById("div_irr").style.display="block";
		document.getElementById("div_update").style.display="none";
		document.getElementById("div_add").style.display="none";
	}
	function update(){
		document.getElementById("search_button").style.borderBottom="none";
		document.getElementById("manual").style.borderBottom="none";
		document.getElementById("delete_b").style.borderBottom="none";
		document.getElementById("update_b").style.borderBottom="5px solid #ff6666";
		document.getElementById("add_b").style.borderBottom="none";
		
		document.getElementById("div_s").style.display="none";
		document.getElementById("div_manual").style.display="none";
		document.getElementById("div_irr").style.display="none";
		document.getElementById("div_update").style.display="block";
		document.getElementById("div_add").style.display="none";
	}
	function add_on(){
		document.getElementById("search_button").style.borderBottom="none";
		document.getElementById("manual").style.borderBottom="none";
		document.getElementById("delete_b").style.borderBottom="none";
		document.getElementById("update_b").style.borderBottom="none";
		document.getElementById("add_b").style.borderBottom="5px solid #ff6666";
		
		document.getElementById("div_s").style.display="none";
		document.getElementById("div_manual").style.display="none";
		document.getElementById("div_irr").style.display="none";
		document.getElementById("div_update").style.display="none";
		document.getElementById("div_add").style.display="block";
	}
</script>

</body>	
</html>