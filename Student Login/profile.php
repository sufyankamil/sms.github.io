<?php
  
  include("../DB FIle/connection.php");
  session_start();
  error_reporting(0);
  $userprofile = $_SESSION['username'];

   
   $query=mysqli_query($con,"select *from student where username='$userprofile'");
   $res =mysqli_fetch_array($query);
   $userprofile=$res['name'];
    

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

  <div id="mdiv">

  <a href="student_home.php">Home</a>

  <a href="profile.php" class="active">Profile</a>

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
		padding: 30px 35px;
	}
	
		
	
	</style>

  
</div>

  <br>
   <center><img src="../images/scoelogo.jpg" height="150px"></center><br>

   <h2 style="margin-left: 25px;">Welcome <?php echo $userprofile; ?></h2>


<br>

<?php



  $query = "SELECT *FROM STUDENT WHERE name='$userprofile'";
  $data = mysqli_query($con,$query);
  $total = mysqli_num_rows($data);

if($total !=0)
{
	
	while($result = mysqli_fetch_assoc($data))

	{

      $rollno=$result['rollno'];
      $pic="../".$result['picsource'];
      $name=$result['name'];
      $class=$result['class'];
      $sem=$result['sem'];
      $pcont=$result['pcont'];
      $email = $result['email'];
	    $username = $result['username'];
	}

}
 

?>


<center>
   <table border="1" cellpadding="10">
    
    <tr>
      <th>Roll NO</th>
      <td><?php echo $rollno; ?></td>
    </tr>

    <tr>
      <th>IMAGE</th>
      <td><?php echo "<img src='".$pic."' height='100' width'100>" ?></td>
    </tr>

    <tr>
      <th>NAME</th>
      <td><?php echo $name; ?></td>
    </tr>

    <tr>
      <th>CLASS</th>
      <td><?php echo $class; ?></td>
    </tr>

    <tr>
      <th>SEM</th>
      <td><?php echo $sem; ?></td>
    </tr>


    <tr>
      <th>PCONT</th>
      <td><?php echo $pcont; ?></td>
    </tr>

    <tr>
      <th>EMAIL</th>
      <td><?php echo $email; ?></td>
    </tr>
    <tr>
      <th>USERNAME</th>
      <td><?php echo $username; ?></td>
    </tr>

 
</table>
</center>
</body>
</html>
