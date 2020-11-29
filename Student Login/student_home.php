<?php
  
  include("../DB FIle/connection.php");
  session_start();
  error_reporting(0);
  $userprofile = $_SESSION['username'];


  
	$query=mysqli_query($con,"select *from student where username='$userprofile'");
    $res =mysqli_fetch_array($query);
    $userprofile=$res['name'];

			

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div id="mdiv">

	<a href="student_home.php" class="active">Home</a>

	<a href="profile.php">Profile</a>

	<a href="about_us.php">About us</a>
	
	<a href="contact_us.php">Contact us</a>
	
	<a href="account.php">Account</a>

  	<a href="student_timetable.php">Exam Time Table</a>
    
    <a href="student_notice.php">Notice</a>
    
     
	<a href="../logout.php" style="margin-left: 690px;">Logout</a>
	 
	
	<style type="text/css">

	#mdiv
	{
		background-color: teal;
		width: 100%;
		padding-top: 10px;
    	padding-bottom: 10px;
	}
	#mdiv .active{
		background-color: lightblue;
		border-radius: 40px;
		color: black;
	}
	 div a
	{
		padding: 20px 35px;
		font-size: 20px;
	}
		
	
	</style>

</div>
		
	<br>
	<br>
	 <center>
	 	<img src="../images/scoelogo.jpg" height="150px" >
	 </center>
	 <br>

	 <h2 style="margin-left: 30px;">Welcome <?php echo $userprofile; ?></h2>


<header id="head" style="margin-left: 40px">
		<h1><center>Welcome to the Saraswati College Of Engineering</center></h1>
   		
   		<p>
	            Saraswati College of Engineering (SCOE) is a premier Engineering institution,
				established for the purpose of imparting state of art technical education to newly
				aspired engineers of the 21st Century. <br>Saraswati college of Engineering is an ISO
				9001- 2008 certified Institute, a quality driven institute, striving hard for
				sustainable QMS. SCOE plans to be a leading research organization with a vision<br>
				of creating a knowledgeable society. The foundation of Saraswati College of
				Engineering was laid on 17th September 2004. 
		</p>

 			<img src="../images/download.jpg" width="450" >
			<img src="../images/download 1.jpg" width="480">
			<img src="../images/s1.jpg" width="445"  align="">

	</header>
</body>
</html>