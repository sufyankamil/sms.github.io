<?php
include("../DB File/connection.php");
error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<div id="menu">
	
		<a class="" href="display_student_list.php">Display Student</a>
		<a href="delete.php">Delete</a>
		<a href="update.php">Update Student details</a>
		<a href="timetable.php">Add Exam Timetable</a>
		<a href="admin_timetable.php">Display Exam Timetable</a>
        <a href="notice.php">Add Notice</a>
        <a href="admin_notice.php">Display Notice</a>
        		
		<li style="float: right; margin-right:  80px;"><a href="../logout.php"> Logout</a></li>

	</div>

	<style type="text/css">

body{
      		width: 100%;
      		height: 100%;
      		margin: 0;
      		top: 0;
    	}

		#menu{
			width: 100%;
			padding: -0px;
     		background-color: goldenrod;
			overflow: hidden;
			padding-top: 10px;
			padding-bottom: 10px;
			display: block;
			list-style-type: none;
			
		}
		 div a{
     		padding: 30px 35px;
      		text-decoration: none;
			color: black;
			font-size: 18px;
		}
		#menu .active{
			background-color: lightgray;
			border-radius: 50px;
			color: black;
		}
		

	</style>
</center>
</head>
<body bgcolor="lightgray">
<br>
	

	<center>
	<img src="../images/admin1.jpg" width="100"><br><h2>Welcome to Saraswati College of Engineering</h2>
	 </center>
		 
	 

	 <h2 style="margin-left: 25px;">Welcome Admin</h2>


  
</body>
</html>