<?php

	session_start();
	
	include("../DB FIle/connection.php");

	$email=$_SESSION['email'];

	$unameqry=mysqli_query($con,"select * from student where email='$email'");
	$row1 = mysqli_fetch_array($unameqry);
	$uname=$row1['username'];

	$picsource=$row1['picsource'];

?>
<html>
<center>

<body bgcolor="orange">	
<form action="" method="post" style="background-color: orange; width: 40%; height:   50%;">

	<br><br><br> 



<h3>Welcome <?php echo $uname; ?>, you can set your new password here</h3>


	<table align="center" border="1" cellpadding="10" >
	
		<tr>
			<th>Profile</th>
			<td><?php echo "<img src='../".$picsource."' height='100' width'100>"; ?></td>
		</tr>

		<tr>
			<th>Username</th>
			<td><?php echo $uname; ?></td>
		</tr>
	

		<tr>
			<th>Email Id</th>
			<td><?php echo $email; ?></td>
		</tr>

	</table>



<h1 align="center">Reset Password</h1>
      

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