<?php
  
  include("../DB FIle/connection.php");
  session_start();
  error_reporting(0);
  $userprofile = $_SESSION['username'];

   
  
  $query=mysqli_query($con,"select *from student where username='$userprofile'");
  $res =mysqli_fetch_array($query);
  $userprofile=$res['name'];

  $uname=$res['username'];

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../style.css">
   <script> 
        function Toggle() { 
            var temp = document.getElementById("typepass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
  </script> 

</head>
<body>

<div id="mdiv">

  <a href="student_home.php">Home</a>

  <a href="profile.php">Profile</a>

  <a href="about_us.php">About us</a>
  
  <a href="contact_us.php">Contact us</a>
  
  <a href="account.php" class="active">Account</a>

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

   <h2 style="margin-left: 25px;">Welcome <?php echo $userprofile; ?></h2>


<br><br><br>

<details style="margin-left: 40px">
  
    <summary>Click here to change Username</summary>
    <br>
    <center>
    <form method="post">
      
      <table border="1" cellpadding="10">

        <tr align="center">
          <td colspan="2">Change Username</td>
        </tr>
    
        <tr>
          <td>Your old username</td>
          <td><input type="text" name="oldusername" value="<?php echo $uname; ?>"></td>
        </tr>
         
        <tr>
          <td>Enter your new username</td>
          <td><input type="text" name="newusername" ></td> 
        </tr>

        <tr align="center">
          <td colspan="2"><input type="submit" name="username_change" value="Change Username"></td>
        </tr> 
      
      </table>

      <br>

    </form>
</center>
</details>

<br>

<details style="margin-left: 40px">
  
    <summary>Click here to change Password</summary>
    <br>
    <center>
    <form method="post">
      
      <table border="1" cellpadding="10">

        <tr align="center">
          <td colspan="2">Change Password</td>
        </tr>
    
        <tr>
          <td>Enter your old password</td>
          <td><input type="password" name="oldpassword" id="typepass"><img src="../images/passicon.png" width="30px" height="15px" onclick="Toggle()" style="margin-bottom: -3px">
          </td>
        </tr>
         
        <tr>
          <td>Enter your new password</td>
          <td><input type="password" name="newpassword" ></td> 
        </tr>

        <tr>
          <td>Renter your new password</td>
          <td><input type="password" name="rnewpassword" ></td> 
        </tr>

        <tr align="center">
          <td colspan="2"><input type="submit" name="password_change" value="Change Password"></td>
        </tr> 
      
      </table>

    </form>
</center>
</details>

<br><br>

</body>
</html>

<?php

  // for username

  if(isset($_POST['username_change']))
  { 

    $oldusername=$_POST['oldusername'];
    $newusername=$_POST['newusername'];

    $chkqry=mysqli_query($con,"select username from student where username='$oldusername'");

    $chkres=mysqli_fetch_array($chkqry);

    $chkusername=$chkres['username'];

    if($chkusername==$oldusername)
    {
        // echo "username matched";

        $uptqry=mysqli_query($con,"update student set username='$newusername' where username='$oldusername'");

        if($uptqry)
        {
            echo "<br><center>Username Updated Successfully<br><br>Please Login with your new Username</center>";
            header('refresh:2,url=../index.php');
        }
        else
        {
          echo "<br><center>Username Fail to Update</center>";
          header('refresh:2,url=account.php');
        }

    }
    else
    {
      echo "<br><center>This is not your username please try with your username</center>";
      header('refresh:2,url=account.php');
    }


  }

  // for password

  if(isset($_POST['password_change']))
  {
     $oldpassword = md5($_POST['oldpassword']);
     $newpassword = md5($_POST['newpassword']);
     $rnewpassword = md5($_POST['rnewpassword']);

    $chkqry1 = mysqli_query($con,"select password from student where password='$oldpassword'");
      
    $chkres1=mysqli_fetch_array($chkqry1);
    $chkpassword = $chkres1['password'];

     if($chkpassword==$oldpassword) 
     {
        // echo "password matched with oldpassword in db";

        if($newpassword==$rnewpassword)
        {

          // echo "<br><center>Password match Successfully</center>";

            $uptqry1 = mysqli_query($con,"update student set password = '$rnewpassword' where password='$oldpassword'");

             if($uptqry1)
            {
                echo "<br><center>Password Updated Successfully<br><br>Please Login with your new Password</center>";
                header('refresh:2,url=../index.php');
            }
            else
            {
              echo "<br><center>Password Fail to Update</center>";
              header('refresh:2,url=account.php');
            }

        }
        else
        {

          echo "<br><center>Please keep the password same for new password and repeat new password.</center>";
          header('refresh:2,url=account.php');

        }


     }    
     else
     {
        echo "<br><center>Please try with your password</center>";
        header('refresh:2,url=account.php');
     }



  }
  
?>