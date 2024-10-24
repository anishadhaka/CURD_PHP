<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
if (isset($_POST['submit'])) 
{
   // print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encryptpass = sha1($password);

      $sql= "SELECT * FROM userdata WHERE username='$username' AND password='$encryptpass'"; 
    //   echo $sql;die;
       
        $result = mysqli_query($conn, $sql); 

        $count=mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count>=1)
        {    
         $_SESSION['username'] = "$username";
         $_SESSION['password'] = "$encryptpass"; 
         $_SESSION['id'] = $row['id']; 
         $_SESSION['username'] = $row['username']; 


        print_r($_SESSION);

         header('location: main.php');           
        }else
        {        
           echo "<script> alert('Incorrect details'); </script>";
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="./css/login.css">
   
</head>

<body>
    <div class="header"></div>
    <h1>Login Profile</h1>
    <form action="" id="login" method="post"  onsubmit="return loginvalidate()">

        <div class="input-group">
            <label>Username</label>
            <input type="text" id="username" name="username" required>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div>

        <div class="input-group">
            <label>password</label>
            <input type="text" id="password" name="password" required>
            <span id="passworderror"   class="error" style="color: red;"></span><br>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="submit" > Login</button>
        </div>
        <p style="text-align:right;font-size:18px;">
             <a href="register.php">Sign up</a>
        </p>
    </form>
    <!-- <script src="./js/login.js"></script> -->
</body>

</html>