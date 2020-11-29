<?php

	include("../DB File/connection.php");

	error_reporting(0);

	$rn=$_GET['id'];
   
     $picqry= mysqli_query($con,"select *from student where rollno='$rn'");
     $picsrc = mysqli_fetch_array($picqry);
     $deletepic="../".$picsrc['picsource'];
     unlink($deletepic); 



	$query="delete from student where rollno='$rn'";

	if(mysqli_query($con,$query))
	{
		header("location:delete.php");
	}
	else
	{
		echo "<font color ='red'>Record not deleted";
		header("refresh:1,url=delete.php");

	}


?>