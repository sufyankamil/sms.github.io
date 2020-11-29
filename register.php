    <?php
    include("DB FIle/connection.php");
    error_reporting(0);

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link  rel="stylesheet" href="style.css">
    </head>
    <body bgcolor="orange">
        <br>
        <center><img src="images/scoelogo.jpg" height="160px"><br>

    <marquee>
    <h2 >Student Registration Page </h2>
     </marquee>     

    <form action="" method="post" enctype="multipart/form-data" style=" width: 45%; height: 60%;">

        <table align="center" border="1" cellpadding="10" >
            <tr>
                <th>Full Name</th>
                <td><input type="text" name="name" placeholder="Enter Full Name" required></td>
            </tr>
            <tr>
                <th>Roll No</th>
                <td><input type="text" name="rollno" placeholder="Enter Roll No" required></td>
            </tr>
            <tr>
                        <th>Department</th>
                        <td>
                            <select name="class" required>
                                <option value="" selected="" disabled="">--select Department--</option>
                                <option value="COMPUTER">Computer</option>
                                <option value="MECHANICAL">Mechanical</option>
                                <option value="CIVIL">Civil</option>
                                <option value="IT">IT</option>
                                <option value="ELECTRONICS">Electronics</option>
                            </select>
                        </td>
                    </tr>
            <tr>
                        <th>Semester</th>
                        <td>
                            <select name="sem" required>
                                <option value="" selected="" disabled="">--select Semester--</option>
                                <option value="SEM 1">SEM 1</option>
                                <option value="SEM 2">SEM 2</option>
                                <option value="SEM 3">SEM 3</option>
                                <option value="SEM 4">SEM 4</option>
                                <option value="SEM 5">SEM 5</option>
                                <option value="SEM 6">SEM 6</option>
                                <option value="SEM 7">SEM 7</option>
                                <option value="SEM 8">SEM 8</option>
                            </select>
                        </td>
                    </tr>
            <tr>
                <th>Parents Contact No</th>
                <td><input type="text" name="pcont" placeholder="Enter the contact no of parents" required></td>
            </tr>
             <th>Upload Image</th>
             <td><input type="file" name="uploadfile" value=""/></td>

             <tr>
                <th>Username</th>
                <td><input type="text" name="username" placeholder="Enter username Name" required></td>
            </tr>

            <tr>
                <th>Password</th>
                <td><input type="password" name="password" placeholder="Enter password" required></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><input type="email" name="email" placeholder="Enter email" required></td>
            </tr>

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
                <td colspan="2" align="center"><input type="submit" name="submit" value="Register"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href='index.php' style="color: red; text-decoration: none;">Click here to login</a></td>

            </tr>


        </table>

        <br><br>
    </form>

    <?php

    if(isset($_POST['submit']))
        {

    $rn = $_POST['rollno'];
    $n = $_POST['name'];
    $cl = $_POST['class'];
    $sem=$_POST['sem'];
    $pcn = $_POST['pcont'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "student/".$filename;
    $user = $_POST['username'];
    $pwd =  $_POST['password'];
    $email = $_POST['email'];
    $sec_q=$_POST['sec_q'];
    $sec_a=$_POST['sec_a'];


      if($rn!="" && $n!="" && $cl!=""  && $sem!="" && $pcn!="" && $filename!="" && $email!="")
       {

        move_uploaded_file($tempname, $folder);  
        $passwordmd5 = md5($pwd);  

        $query1="SELECT * FROM student where username='$user'";
        $run =mysqli_query($con,$query1);


        $queryemail="SELECT * FROM student where email='$email'";
        $runemail =mysqli_query($con,$queryemail);


        if(mysqli_num_rows($run)>0){

            echo "<br><center>Username already exist,please try another</center>";

            header('refresh:1,url=register.php');

           exit();

        }
        elseif(mysqli_num_rows($runemail)>0)
        {
            echo "<br><center>Email already exist,please try another email</center>";

            header('refresh:1,url=register.php');

           exit();
        }
        else{

            $query = "INSERT INTO STUDENT VALUES('','$rn','$n','$cl','$sem','$pcn','$folder','$user','$passwordmd5','$email','$sec_q','$sec_a')";
              $data  = mysqli_query($con,$query);

               if($data)

               {
                ?>
                <script>
                    alert('Student Registered Successfully');
                    window.open('index.php','_self');
                </script>

                <?php
               echo "<center><font color='green'>Student registered successfully</center>";
                
               header('refresh:1,url=index.php');


               }

           }


         }  

    }

    ?> 


    </center>
    </body>
    </html>