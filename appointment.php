<html>
<head>
<title>Appointment</title>
<style>
*{
	font-family: Tahoma, sans-serif;
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
.error {color: #FF0000; font-size:20px}
</style>
</head>

<body>

<a href="http://localhost/Mini%20project/home%20page.php">
	<img src="http://localhost/Mini project/logo.png" width="300" height="80">
</a>

<button type="button" onclick="toAdminLogin()" class="cb">Admin</button>

<div class="bdiv">
<button type="button" onclick="toHome()" class="ab" style="float:left;margin-left:20px">Home</button>
<img src="http://localhost/Minor project/searchbar.png" class="sb">
<button type="button" onclick="toContactUs()" class="ab" style="margin-right:15px">Contact us</button>
<button type="button" onclick="toAboutUs()" class="ab">About us</button>
</div>

<div>

<div class="mdiv">
<button type="button" onclick="toScheduleAppointment()" class="mbutton">Schedule Appointment</button>
<button type="button" onclick="toCancelAppointment()" class="mbutton">Cancel Appointment</button>
<br>
<button type="button" onclick="toDoctorInfo()" class="mbutton">Doctors' Info</button>
<br>
<button type="button" onclick="toDep()" class="mbutton">Departments</button>
<br>
<button type="button" onclick="toFeedback()" class="mbutton">Feedback</button>
</div>

<div style="float:left;margin-left:10px;height:495px;width:1000px">
<p style="font-size:30px;margin-top:10px;margin-bottom:-12px;"><b>APPOINTMENT FORM</b></p>
<p style="font-size:20px">To get an appointment, kindly fill the provided form.</p>

<?php
$alreadyexists='';
$wrongdate='';
if(isset($_POST["submit"])){
	$tomorrow=strtotime("tomorrow");
	$tomorrow=date("Y-m-d", $tomorrow);
	
	$next=strtotime("+26 days");
	$next=date("Y-m-d",$next);
	
	if($_POST["doa"]<$tomorrow || $_POST["doa"]>$next){
		$wrongdate='You can get an appointment only between '.$tomorrow." to ".$next." (YY-MM-DD)";
	}
	else{
		$name=$_POST["username"];
		$age=$_POST["age"];
		$gender=$_POST["gender"];
		$email=$_POST["useremail"];
		$contact_no=$_POST["contact_no"];
		$date_of_appointment=$_POST["doa"];
		$desc=$_POST["desc"];
		
		$conn=oci_connect("system","yash","XE");
		$check="SELECT * FROM patient WHERE name='$name' and (email='$email' or contact_no='$contact_no')";
		$sql = "INSERT INTO patient 
					VALUES ('', '$name', '$age', '$gender', '$email', '$contact_no','$date_of_appointment','$desc','','','','','','')";
		$result=oci_parse($conn,$check);	
		oci_execute($result);
		if(oci_fetch_assoc($result)==true){
			$alreadyexists='Entry with provided user information alreadyexists!';
		}
		else{
			$final=oci_parse($conn,$sql);
			oci_execute($final);
			header("Location: http://localhost/Mini%20project/appointment%20form%20filled.php");
		}
		oci_close($conn);
	}
}
?>



<div style="width:1020px;height:395px;overflow:auto">
	<form method="POST" action="" autocomplete="off">
		<span class="error">Appointment fees is Rs.150/- and will be applicable at the time of physical visit.</span><br><br>
		
		<input type="text" name="username" placeholder="Full name" title="Name must contain alphabets and spaces only with max length 40!" maxlength="40" pattern="[A-Za-z ]{1,40}" style="border-radius:5px;height:30px;font-size:20px" required></input>
		
		<span class="error"><?php echo '  '.$alreadyexists.'';?></span>
		<br><br>
		
		<input type="text" name="age" maxlength="2" title="Age must be a two digit number!" pattern="[0-9]{2}" placeholder="Age" style="border-radius:5px;height:30px;font-size:20px" required></input>
		<br><br>
		
		<label for="gender" style="font-size:20px">Select gender: </label>
		<select name="gender" id="gender" style="font-size:18px">
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		<option value="Others">Others</option>
		</select>
		
		<br><br>
		
		<input type="email" name="useremail" style="border-radius:5px;height:30px;font-size:20px" placeholder="Email" required></input>
		<br><br>
		
		<input type="text" name="contact_no" maxlength="10" title="Contact No. must be a 10-digit number!" pattern="[0-9]{10}" placeholder="Contact No." style="border-radius:5px;height:30px;font-size:20px" required></input><br><br>
		
		<label for="doa" style="font-size:20px">Date of appointment: </label>
		<input type="date" name="doa" required></input></span><span class="error" style="font-size:17px"><?php echo '  '.$wrongdate.'';?>
		<br><br>
		
		<textarea name="desc" placeholder="Description of illness/Symptoms" rows="10" cols="100" required></textarea>
		<br><br>
		<input type="submit" name="submit" value="Submit application form" style="cursor:pointer;color:white;background-color:rgb(0, 102, 255);font-size:20px;padding:5px;border-radius:5px"></input>
	</form>
	</div>
	</div>

</div>

<script>
	function toHome(){
		location.replace("http://localhost/Mini%20project/home%20page.php")
	}
	function toFeedback(){
		location.replace("http://localhost/Mini%20project/feedback.php");
	}
	function toScheduleAppointment(){
		location.replace("http://localhost/Mini%20project/appointment.php");
	}
	function toCancelAppointment(){
		location.replace("http://localhost/Mini%20project/cancel%20appointment.php");
	}
	function toDep(){
		location.replace("http://localhost/Mini%20project/departments.php");
	}
	function toDoctorInfo(){
		location.replace("http://localhost/Mini%20project/doctorsinfo.php");
	}
	function toAdminLogin(){
		location.replace("http://localhost/Mini%20project/admin%20login.php");
	}
	function toContactUs(){
		location.replace("http://localhost/Mini%20project/contact%20us.php");
	}
	function toAboutUs(){
		location.replace("http://localhost/Mini%20project/about%20us.php");
	}
</script>

</body>	
</html>