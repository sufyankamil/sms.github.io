<?php
include("../DB File/connection.php");
error_reporting(0);
$query = "SELECT *FROM STUDENT";
$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);


if($total !=0)
{
	?>
  <div id="menu">
	
		<a class="active" href="display_student_list.php">Display Student</a>
		<a href="delete.php">Delete</a>
		<a href="update.php">Update Student details</a>
		<a href="timetable.php">Add Exam Timetable</a>
		<a href="admin_timetable.php">Display Exam Timetable</a>
        <a href="notice.php">Add Notice</a>
        <a href="admin_notice.php">Display Notice</a>
        		
		<li style="float: right; margin-right:  80px;"><a href="../logout.php"> Logout</a></li>

	</div>

	<style type="text/css">

    	body{
      		width: 100%;
      		height: 100%;
      		margin: 0;
      		top: 0;
    	}

		#menu{
			width: 100%;
			padding: -0px;
     		background-color: goldenrod;
			overflow: hidden;
			padding-top: 10px;
			padding-bottom: 10px;
			display: block;
			list-style-type: none;
			
		}
		 div a{
     		padding: 30px 35px;
      		text-decoration: none;
			color: black;
			font-size: 18px;
		}
		#menu .active{
			background-color: lightgray;
			border-radius: 50px;
			color: black;
		}
		 

	</style>

  </head>


  <body bgcolor="lightgray">

  <br>

  <center>
  <img src="../images/admin1.jpg" width="100"><br><h2>Welcome to Saraswati College of Engineering</h2>
     </center>


   <h2 style="margin-left: 25px;">Welcome Admin</h2>


<center>
   <table bgcolor="white" border="1"  align="center" cellpadding="5">
    
   	<tr>
   		<th>Roll NO</th>
   		<th>IMAGE</th>
   		<th>NAME</th>
   		<th>CLASS</th>
      <th>SEM</th>
   		<th>PCONT</th>
      <th>EMAIL</th>
   		
   	</tr>
    
   </center>
      
	<?php
	while($result = mysqli_fetch_assoc($data))



	{


        echo "<tr>
   		<td>".$result['rollno']."</td>
   		<td><a href='../$result[picsource]'><img src='../".$result['picsource']."' height='100' width='100' /></a></td>
   		<td>".$result['name']."</td>
   		<td>".$result['class']."</td>
      <td>".$result['sem']."</td>
   		<td>".$result['pcont']."</td>
      <td>".$result['email']."</td>
   		
    	
        </tr>";

		 
	}

}
 

?>

</table>

<br><br>

</body>