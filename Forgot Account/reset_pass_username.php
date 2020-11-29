<?php

	session_start();
	
	include("../DB FIle/connection.php");

	$uname=$_SESSION['uname'];

?>
<html>
<center>

<body bgcolor="pink">	
<form action="" method="post" style="background-color: pink; width: 40%; height:   50%;">

	<br>
	<br>

<center><img src="../images/scoelogo.jpg" height="150px"></center>

	<br>

<h1 align="center">Reset Password</h1>
<br>

<h3>Welcome <?php echo $uname; ?>, you can set your new password here</h3>
      
<br><br>
	<table align="center" border="1" cellpadding="10" >
		<tr>
			<th>New Password</th>
			<td><input type="password" name="password" placeholder="Enter new password"></td>
		</tr>
	

		<tr>
			<th>Confirm Password</th>
			<td><input type="password" name="cpassword" placeholder="Enter password again"></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="sub_pass" value="Set Password"></td>
		</tr>

	</table>



</form>
</center>
</body>
</html>

<?php
	
	if(isset($_POST['sub_pass']))
	{
		$password=md5($_POST['password']);
		$cpassword=md5($_POST['cpassword']);

		if($password==$cpassword)
		{
			$qry=mysqli_query($con,"update student set password='$cpassword' where username='$uname'");

			if($qry)
			{
				echo "<br><center>Password set successfully for username $uname</center>";
				header("refresh:2,url=../index.php");
			}
			else
			{	
				echo "<br><center>Failed to set new password</center>";
				header("refresh:2,url=reset_pass.php");
			}

		}
		else
		{
			echo "<br><center>Password didn't match</center>";
			header("refresh:2,url=reset_pass.php");
		}

	}

?>