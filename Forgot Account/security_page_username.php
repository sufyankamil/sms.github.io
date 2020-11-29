<?php

	session_start();
	
	include("../DB FIle/connection.php");

	$uname=$_SESSION['uname'];

?>
<html>
<center>
<body bgcolor="pink">
<form method="post" style="background-color: pink; width: 40%; height:   50%;">

	<br>

<center><img src="../images/scoelogo.jpg" height="150px"></center>
<br>



<h1 align="center">Welcome <?php echo $uname ?>, Answer this question to confirm your account</h1><br>

	<table align="center" border="1" cellpadding="10" >
		
		<tr>
			<th>Security Question</th>
			<td>
				<select name="sec_q" required>
					<option value="" selected disabled>--select security question--</option>
					<option value="What is your pet name?" title="Pet name that only you knows">What is your pet name?</option>
					<option value="What is the name of the town where you were born?" title="Attach simple lane no with your town">What is the name of the town where you were born?</option>
					<option value="What is your secondary email id?" title="Do not use your primary email id">What is your secondary email id?</option>
					<option value="Where was your best family vacation as a kid?" title="Enter the country-city-town for family vacation answer">Where was your best family vacation as a kid?</option>
				</select>
			</td>
		</tr>

		<tr>
			<th>Security Answer</th>
			<td><input type="text" name="sec_a" title="Please check the note for the selected security question" placeholder="Note title of security question" required></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="chk_sec" value="Submit"></td>
		</tr>

	</table>

</form>
</center>
</body>
</html>

<?php

	if(isset($_POST['chk_sec']))
	{
		$sec_q=$_POST['sec_q'];
		$sec_a=$_POST['sec_a'];

		$qry=mysqli_query($con,"select * from student where username='$uname'");

		while($row=mysqli_fetch_array($qry))
		{
			$dbsec_q=$row['sec_q'];
			$dbsec_a=$row['sec_a'];

			if($sec_q==$dbsec_q && $sec_a==$dbsec_a)
			{


				?>
			<script>
				alert('Your Security Question and Answer matched');
				$_SESSION['uname']=$uname;
				window.open('reset_pass_username.php','_self');
			</script>


				<?php
				//echo "<center>Your Security Question and Answer matched</center>";
				$_SESSION['uname']=$uname;
				header("refresh:2,url=reset_pass_username.php");
			}
			else
			{
				?>

			<script>
				alert('Your Security Question and Answer was incorrect');
				window.open('security_page_username.php','_self');
			</script>

			<?php

				echo "<center>Your Security Question and Answer didn't matched</center>";
				header("refresh:2,url=security_page_username.php");

			}
		

		}

		


	}
	

?>
