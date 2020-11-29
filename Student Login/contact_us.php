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

  <a href="student_home.php">Home</a>

  <a href="profile.php">Profile</a>

  <a href="about_us.php">About us</a>
  
  <a href="contact_us.php" class="active">Contact us</a>
  
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
		padding: 30px 35px;
	}
	
		
	
	</style>

     
</div>

	 <br><br><br>
   <center><img src="../images/scoelogo.jpg" height="150px"></center><br>
   

   <h2 style="margin-left: 25px;">Welcome <?php echo $userprofile; ?></h2>


<br><br><br>

<header style="margin-left: 40px">


<h2>Location:</h2>
<b>
Kharghar, Navi Mumbai,<br>
Pin - 410210<br>
Phone - +91 9274008832<br>
Email - info@saraswaticlg.com
</b>

<center>
  
  <iframe src="https://www.youtube.com/embed/jNykR9xjlJQ" height="400" width="700" style="margin-top: -170px;"></iframe>

  <br><br>

</center>

</header>
	

</body>
</html>