<?php
session_start();
include("DB FIle/connection.php");

?>
<center><br>

    <div id="maindiv">

    <a href="index.php" style="float: left;"> STUDENT LOGIN</a>
    
    
</div><br><br>

    
    <center><img src="images/scoelogo.jpg" height="150px"></center><br>

    <link rel="stylesheet" type="text/css" href="style.css">
<form action="" method="post" width: 40%; height: 50%;">
    <br><br>
    <h1>ADMIN LOGIN</h1><br>
    
Username <input type="text" name="username" value=""/><br><br>	
Password <input type="password" name="password" value=""/><br><br>
<input type="submit" name="submit" value="Login"/><br><br>

</form>
</center>





<?php
if(isset($_POST['submit']))
{

	$user = $_POST['username'];
	$pwd =  md5($_POST['password']);
    $query = "SELECT *FROM STUDENT WHERE username='$user' && password='$pwd'";
    $data = mysqli_query($con,$query);
    $total = mysqli_num_rows($data);
    if($total==1)
    {
    	//$_SESSION['username'] =$user;
        //echo "<center>Student Login Successfully</center>";
    	//header('refresh:1,url=Student Login/student_home.php');
    }
    else if($user=='admin' && md5($pwd=='admin123'))
    {
        ?>

        <script>
            alert('Admin Login Successfully');
            window.open('Admin Login/display_student_list.php','_self');
        </script>

        <?php

        echo "<center>Admin Login Successfully</center>";
        header('refresh:1,url=Admin Login/admin_home.php');
    }
    else
   {
        echo "<center>Incorrect username or password</center>";
        header('refresh:1,url=index.php');

   }

}


?>