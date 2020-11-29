<html>
<center>
<body bgcolor="pink">
<form method="post" style="background-color: pink; width: 40%; height:   50%;">

<br>

<center><img src="../images/scoelogo.jpg" height="150px"></center>

	<br><br><br><br>
	

<h1 align="center">Forgot Account</h1>

	<table align="center" border="1" cellpadding="10" >
		<tr>
			<th>Username</th>
			<td><input type="text" name="uname" placeholder="Enter your username"><strong> OR</strong></td>
		</tr>
	

		<tr>
			<th>Email</th>
			<td><input type="email" name="email" placeholder="Enter your email id"></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="chk_accn" value="Check Account"></td>
		</tr>

	</table>

</form>
</center>
</body>
</html>

<?php

	session_start();
	
	include("../DB FIle/connection.php");

	if(isset($_POST['chk_accn']))
	{
		$uname=$_POST['uname'];
		$email=$_POST['email'];

		if($uname)
		{
			$unameqry=mysqli_query($con,"select username from student where username='$uname'");
			$row1 = mysqli_num_rows($unameqry);

			if($row1==1)
			{

			?>	
			<script>
				alert('Username Matched with our records');
				$_SESSION['uname']=$uname;
				window.open('security_page_username.php','_self');
			</script>

				<?php
				//echo "<br><center>Username Matched with our records</center>";

				$_SESSION['uname']=$uname;

				header("refresh:2,url=security_page_username.php");
			}
			else
			{
			//	echo "<br><center>Username didn't match with our records</center>";
				header("refresh:2,url=check_account.php");
			}

			
		}


		if($email)
		{

			$emailqry=mysqli_query($con,"select email from student where email='$email'");
			$row2 = mysqli_num_rows($emailqry);

			if($row2==1)
			{
				echo "<br><center>Email Matched with our records</center>";

				$_SESSION['email']=$email;

				header("refresh:2,url=security_page_email.php");
			}
			else
			{
				echo "<br><center>Email didn't match with our records</center>";
				header("refresh:2,url=check_account.php");
			}

			
		}


	}
	

?>
