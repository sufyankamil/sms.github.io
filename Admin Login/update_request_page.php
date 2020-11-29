<?php
include("../DB File/connection.php");
error_reporting(0);
 $_GET['rn'];
 $_GET['n'];
 $_GET['cl'];
 $_GET['sem'];
 $_GET['pcn'];
 $_GET['email'];
 

?>

<!DOCTYPE html>
<html>
<head>
 <style type="text/css">

    body{
      width: 100%;
      height: 100%;
      margin: 0;
      top: 0;
    }

    #menu{
      width: 100%;
      overflow: hidden;
      padding-top: 10px;
      padding-bottom:10px;
      background-color: white;
      display:block;
      list-style-type: none;
      text-decoration: none;
      font-size:20px;
    }
     div a{
      padding: 30px 35px;
      text-decoration: none;
    }
    #menu .active{
		background-color: lightblue;
		border-radius: 40px;
		color: black;
	}

    
  </style>

  </head>

  <div id="menu">
  
  <a href="display_student_list.php">Display Student</a>

  <a href="delete.php">Delete</a>
  
  <a class="active"  href="update.php">Update Student details</a>
  
  <a href="timetable.php"> Exam Timetable</a>
      
    <li style="float: right; margin-right: 50px;"><a href="../logout.php"> Logout</a></li>    
  </ul>

</div>

  <body bgcolor="lightblue">

  <br><br>

  <center>
  <img src="../images/admin1.jpg"><br><h2>Welcome to Sarasvati College of Engineering</h2>
     </center>


   <h2 style="margin-left: 25px;">Welcome Admin</h2>

<body bgcolor="blue">
<form action="" method="GET">

  <table bgcolor="white" align="center" border="1" cellpadding="10">
    <tr>
      <th>Roll No</th>
      <td><input type="text" name="rollno" placeholder="Enter Rollno" value="<?php echo $_GET['rn']; ?>"/></td>
    </tr>
    
      

    <tr>
      <th>Full Name</th>
      <td><input type="text" name="name" placeholder="Enter Full Name" value="<?php echo $_GET['n']; ?>"/></td>
    </tr>

    <tr>
      <th>Class</th>
      <td><input type="text" name="class" placeholder="Enter class" value="<?php echo $_GET['cl']; ?>"/></td>
    </tr>

    <tr>
      <th>Sem</th>
      <td><input type="text" name="sem" placeholder="Enter Semester" value="<?php echo $_GET['sem']; ?>"/></td>
    </tr>
    
    <tr>
      <th>Parents Contact No</th>
      <td><input type="text" name="pcont" placeholder="Enter the contact no of parents" value="<?php echo $_GET['pcn']; ?>"/></td>
    </tr>
    
    <tr>
      <th>Email</th>
      <td><input type="text" name="email" placeholder="Enter the Email" value="<?php echo $_GET['email']; ?>"/></td>
    </tr>
    
      
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
    </tr>


  </table>
</form>

<?php

if($_GET['submit'])
  {
        $rn = $_GET['rollno'];
         $n  = $_GET['name'];
         $cl = $_GET['class'];
         $sem = $_GET['sem'];
         $pcn = $_GET['pcont'];
         $email = $_GET['email'];

        $query ="UPDATE STUDENT SET NAME='$n', CLASS='$cl', Sem='$sem', pcont ='$pcn',email='$email' WHERE ROLLNO='$rn' ";
        
        $data = mysqli_query($con,$query);
         
         if($data)

         {
     
          echo "<center>Record update successfully</center>";
          header('refresh:1,url=update.php');

         }
         else
         {

            echo "<font color='red'> Record not updated.";
            header('refresh:1,url=update.php');


         } 
          
         }
         

?>

</body>
</html>





