<?php
session_start();
include("DB FIle/connection.php");

?>
<center><br>

    <div id="maindiv">

    <a href="adminlog.php" style="float: right;"> ADMIN LOGIN</a>

    <style type="text/css">

    #maindiv{
        width: 100%;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    
</style>
         
</div><br><br>

    
    <center><img src="images/scoelogo.jpg" height="150px"></center><br>

    <link rel="stylesheet" type="text/css" href="style.css">
<form action="" method="post"  width: 40%; height: 50%;">
    <br><br>
    <h1>Student Management System</h1><br>
    
Username <input type="text" name="username" value=""/><br><br>	
Password <input type="password" name="password" value=""/><br><br>
<input type="submit" name="submit" value="Login"/><br><br>


<a href='Forgot Account/check_account.php' style="color: black;" >Forget Account ?</a><br><br>


<a href='register.php' style="color: red; text-decoration: none;">Click here to Register</a>
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
        $_SESSION['username'] =$user;
        ?>
        <script>
           // alert('Student Login Successfully');
            window.open('Student Login/student_home.php','_self');
        </script>
        
        <?php

        echo "<center><b>Student Login Successfully</b></center>";
    	header('refresh:1,url=Student Login/student_home.php');
    }
    //else if($user=='admin' && md5($pwd=='admin123'))
    //{
    //    echo "<center>Admin Login Successfully</center>";
    //    header('refresh:1,url=Admin Login/admin_home.php');
    //}
    else
   {
        ?>
        <script>
            alert('Incorrect username or password');
            window.open('index.php','_self');
        </script>

        <?php
        echo "<center>Incorrect username or password</center>";
        header('refresh:1,url=index.php');

   }

}


?>