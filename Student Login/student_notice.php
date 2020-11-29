<?php
  
  include("../DB FIle/connection.php");
  session_start();
  error_reporting(0);
  $userprofile = $_SESSION['username'];

   
   $query=mysqli_query($con,"select *from student where username='$userprofile'");
   $res =mysqli_fetch_array($query);
   $userprofile=$res['name'];

   $class=$res['class'];
   $sem=$res['sem'];
    

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>


<div id="mdiv">

  <a href="student_home.php">Home</a>

  <a href="profile.php">Profile</a>

  <a href="about_us.php">About us</a>
  
  <a href="contact_us.php">Contact us</a>
  
  <a href="account.php">Account</a>

  <a href="student_timetable.php">Exam Time Table</a>

  <a href="student_notice.php" class="active">Notice</a>    


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

<?php


    $qry=mysqli_query($con,"select * from notice_tt where class='$class' and sem='$sem' ");

    echo "<center><table border='1' cellpadding='10'>";

    echo "<tr><td align='center' colspan='7'><h2>Notice Board</h2></td></tr>";

    echo "<tr><th>Sr.no</th><th>Academic year</th><th>Class</th><th>Sem</th><th>Date</th><th>Notice</th></tr>";

    $i=1;

    while($row=mysqli_fetch_array($qry))
    {
    
        echo "<tr>
            <td>".$i."</td>
            <td>".$row['ayear']."</td>
            <td>".$row['class']."</td>
            <td>".$row['sem']."</td>
            <td>".$row['date']."</td>
            <td>".$row['notice']."</td></tr>"; 

            $i++;

    }

    echo "</table></center><br><br>";


?>


</body>
</html>
