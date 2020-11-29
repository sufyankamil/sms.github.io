<?php
  
  include("../DB FIle/connection.php");
  session_start();
  error_reporting(0);
 // $userprofile = $_SESSION['username'];


 // $query=mysqli_query($con,"select *from student where username='$userprofile'");
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

  <a href="about_us.php" class="active">About us</a>
  
  <a href="contact_us.php">Contact us</a>
  
  <a href="account.php">Account</a>

  <a href="student_timetable.php">Exam Time Table</a>

   <a href="student_notice.php">Notice</a>  
  
  <a href="../logout.php" style="margin-left: 700px;">Logout</a>

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

   <h2 style="margin-left: 25px;"><?php echo $userprofile; ?></h2>


<br><br>

<header style="margin-left: 27px">
  <p>

    <center>
    <h1>ABOUT US</h1>
    </center>
    <h3>Saraswati College of Engineering is the leading engineering institution in Navi Mumbai established in 2004.
       We aspire to be a leading research organization with a dream and vision of creating a knowledgeable society. 
       SCOE is provided with spacious buildings to accommodate reception, auditorium, office, classrooms, staff rooms, drawing halls, laboratories, workshop, library, computer center, conference halls, examination hall, recreation center, sports rooms, canteen, and placement cell.</h4>
    
    
    <br>
    <center>
    <h2>VISION<h2>
    <h3>“To develop a core of eminency in Engineering Education and Research”</h3>
    </center>

    <br><br>

    <center>
    <h2>MISSION</h2>
    <h3>“To educate Students to become quality techno-crafts for taking up challenges in all facets of life”</h3>
    </center>
  </p>

</header>



</body>
</html>


