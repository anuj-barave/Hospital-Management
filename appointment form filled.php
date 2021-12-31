<html>
<head>
<title>Appointment Form filled</title>
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

<div style="margin-left:10px;float:left;width:1010px;font-size:20px">
<p>Your appointment form has been successfully filled!<br>You will receive a confirmation email shortly.</p>
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