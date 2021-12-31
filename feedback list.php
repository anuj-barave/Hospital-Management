<html>
<head>
<title>Feedback List</title>
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

<div style="width:1350px;height:495px;overflow:auto">
		<table style="width:1330px;font-size:20px">
			<tr>
				<th>Serial No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Feedback</th>
			</tr>
			<?php
				$conn = oci_connect('system', 'yash', 'XE');
				if($conn){}
				$stid = oci_parse($conn, 'SELECT * FROM feedback');
				oci_execute($stid);
				$i=1;
				while (($row = oci_fetch_assoc($stid)) != false) {
					echo "<tr>";
					echo "<td>", $i ,")","</td>";
					echo "<td>", $row['NAME'] ,"</td>";
					echo "<td>", $row['EMAIL'] ,"</td>";
					echo "<td>", $row['FEEDBACK'] ,"</td>";
					echo "</tr>";
					$i++;
				}
				oci_free_statement($stid);
				oci_close($conn);				
			?>	
		</table>
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
</script>

</body>	
</html>