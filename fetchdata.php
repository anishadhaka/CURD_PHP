<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
if (isset($_POST['username']) && isset($_POST['password'])) 
{
   // print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encryptpass = sha1($password);

      $sql= "SELECT userdataid FROM userdata WHERE username='$username' AND password='$encryptpass'"; 
     
       
        $result = mysqli_query($conn, $sql); 

        $count=mysqli_num_rows($result);
        if($count>=1)
        {    
         $_SESSION['username'] = "$username";
         $_SESSION['password'] = "$encryptpass";   

        print_r($_SESSION);

         header('location: dashboard.php');           
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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
   
</head>
<?php include 'main.php';?>
<body>
    <div class="header"></div>
    <h1>Login Profile</h1>
    <form action="login.php" id="login" method="post"  onsubmit="return compare_hash()">

        <div class="input-group">
            <label>Username</label>
            <input type="text" id="username" name="username">
            <p id="name" style="color: red;"></p>
        </div>

        <div class="input-group">
            <label>password</label>
            <input type="text" id="password" name="password">
            <p id="pass" style="color: red;"></p>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="submit" onsubmit="return login()">Login</button>
        </div>
        <p>
             <a href="updateprofile.php">Sign up</a>
        </p>
    </form>
</body>

</html>