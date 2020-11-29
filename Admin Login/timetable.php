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
		<a class="active" href="timetable.php">Add Exam Timetable</a>
		<a class="" href="admin_timetable.php">Display Exam Timetable</a>
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
	<img src="../images/admin1.jpg" width="100"><br><h2>Welcome to Sarasvati College of Engineering</h2>
     </center>


	 <h2 style="margin-left: 25px;">Welcome Admin</h2>


	<form method="post">
		
		<center>
			
			<table border="1" cellpadding="10">

				<tr>
					<td colspan="2" align="center"><h2>Exam Time Table</h2></td>
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
					<td>Subject</td>
					<td><input type="text" name="subject" placeholder="Enter the subject" required></td>
				</tr>

				<tr>
					<td>Time</td>
					<td><input type="text" name="etime" title="Time in ex. 2:00 PM to 5:00 PM" placeholder="Enter the time" required></td>
				</tr>

				<tr>
					<td>Date</td>
					<td><input type="date" name="edate" required></td>
				</tr>

				<tr>
					<td>Block No</td>
					<td>
						<select name="block_no" required>
							<option value="" selected="" disabled="">--select block no--</option>
							<option value="101">101</option>
							<option value="102">102</option>
							<option value="201">201</option>
							<option value="202">202</option>
							<option value="204">204</option>
						</select>
					</td>
				</tr>

				<tr>
					<td align="center" colspan="2"><input type="submit" name="submit_tt" value="Add Subject to Exam Time Table"></td>
				</tr>

			</table>

		</center>

		<br><br><br>

	</form>
	
</body>
</html>

<?php

	include("../DB File/connection.php");
	error_reporting(0);

	if(isset($_POST['submit_tt']))
	{
		$ayear=$_POST['ayear'];
		$class=$_POST['class'];
		$sem=$_POST['sem'];
		$subject=$_POST['subject'];
		$etime=$_POST['etime'];
		$edate=$_POST['edate'];
		$block_no=$_POST['block_no'];
		

		 $query = mysqli_query($con,"INSERT INTO exam_tt VALUES('','$ayear','$class','$sem','$subject','$etime','$edate','$block_no')");
	    
	      if($query)
	      {
			?>
			<script>
                    alert('Exam Time Table added successfully');
                    window.open('timetable.php','_self');
            </script>

			<?php
		 	echo "<center>Exam Time Table added successfully</center>";
	        header('refresh:1,url=timetable.php');

	       }
	       else
	       {
	       	echo "<center>Failed to add exam timetable</center>";
	        header('refresh:1,url=timetable.php');
	       }

	

	}

?>