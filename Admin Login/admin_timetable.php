<?php
include("../DB File/connection.php");
error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<div id="menu">
	
		<a href="display_student_list.php">Display Student</a>
		<a href="delete.php">Delete</a>
		<a href="update.php">Update Student details</a>
		<a href="timetable.php">Add Exam Timetable</a>
		<a class="active" href="admin_timetable.php">Display Exam Timetable</a>
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


<br><br>

<form method="post">
		
		<center>
			
			<table border="1" cellpadding="10">

				<tr>
					<td colspan="2" align="center"><h2>Display Exam Time Table</h2></td>
				</tr>

				<tr>
					<td>Academic Year</td>
					<td>
						<select name="ayear" required>
							<option value="" selected="" disabled="">--select academic year--</option>
							<option value="2020-2021">2020-2021</option>
							<option value="2021-2022">2021-2022</option>
							
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Class</td>
					<td>
						<select name="class" required>
							<option value="" selected="" disabled="">--select class--</option>
							<option value="COMPUTER">Computer</option>
							<option value="MECHANICAL">Mechanical</option>
							<option value="CIVIL">Civil</option>
							<option value="IT">IT</option>
							<option value="ELECTRONICS">Electronics</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>Semester</td>
					<td>
						<select name="sem" required>
							<option value="" selected="" disabled="">--select Semester--</option>
							<option value="SEM 1">SEM 1</option>
							<option value="SEM 2">SEM 2</option>
							<option value="SEM 3">SEM 3</option>
							<option value="SEM 4">SEM 4</option>
							<option value="SEM 5">SEM 5</option>
							<option value="SEM 6">SEM 6</option>
							<option value="SEM 7">SEM 7</option>
							<option value="SEM 8">SEM 8</option>
						</select>
					</td>
				</tr>

		

				<tr>
					<td align="center" colspan="2"><input type="submit" name="display_submit" value="Display Timetable"></td>
				</tr>

				</table>
			</center>
		</form>

		<br><br>

	
</body>
</html>

<?php

	include("../DB File/connection.php");
	error_reporting(0);

	if(isset($_POST['display_submit']))
	{
		$ayear=$_POST['ayear'];
		$class=$_POST['class'];
		$sem=$_POST['sem'];

		$qry=mysqli_query($con,"select * from exam_tt where ayear='$ayear' and class='$class' and sem='$sem'");

		echo "<center><table border='1' cellpadding='10'>";

		echo "<tr><th>Sr.no</th><th>Academic year</th><th>Class</th><th>Sem</th><th>Subject</th><th>Time</th><th>Date</th><th>Block</th></tr>";

		while($row=mysqli_fetch_array($qry))
		{
		
				echo "<tr>
			   		<td>".$row['e_tt_id']."</td>
			   		<td>".$row['ayear']."</td>
			   		<td>".$row['class']."</td>
			   		<td>".$row['sem']."</td>
			   		<td>".$row['subject']."</td>
			   		<td>".$row['time']."</td>
			   		<td>".$row['date']."</td>
			       <td>".$row['block']."</td></tr>";	

		}

		echo "</table></center><br><br>";

	
	}
	else
	{
		$qry=mysqli_query($con,"select * from exam_tt");

		echo "<center><table border='1' cellpadding='10'>";

		echo "<tr><th>Sr.no</th><th>Academic year</th><th>Class</th><th>Sem</th><th>Subject</th><th>Time</th><th>Date</th><th>Block</th></tr>";

		while($row=mysqli_fetch_array($qry))
		{
		
				echo "<tr>
			   		<td>".$row['e_tt_id']."</td>
			   		<td>".$row['ayear']."</td>
			   		<td>".$row['class']."</td>
			   		<td>".$row['sem']."</td>
			   		<td>".$row['subject']."</td>
			   		<td>".$row['time']."</td>
			   		<td>".$row['date']."</td>
			      <td>".$row['block']."</td></tr>";	

		}

		echo "</table></center><br><br>";
	}


?>