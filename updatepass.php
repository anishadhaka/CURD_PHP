
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
if (isset($_SESSION['id']) && isset($_POST['oldpassword'])) {
     $oldpassword = $_POST['oldpassword'];
    //  $encryptpass = sha1($oldpassword);
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM `userdata`WHERE id='$id' and password ='$oldpassword';";
   
    $result = mysqli_query($conn, $sql);
    // $row=mysqli_fetch_assoc($result);
    // print_r($row);die;
    
    $count = mysqli_num_rows($result);
   
    if ($count == 1) {
        $con = new mysqli($servername, $username, $password, $dbname);

        if (isset($_POST["Reset"])) {
          $oldpassword = $_POST['oldpassword'];
        //   $encryptpass = sha1($oldpassword);
            $password = $_POST['Newpassword'];
            // $encryptpassword = sha1($password);
            $id = $_GET['id'];

            $sql = "UPDATE `userdata` SET `password` = '$password' WHERE `id` = $id;";
            // print_r($sql);die;
            $results = mysqli_query($con, $sql);
            $count=mysqli_num_rows($result);
            if($count==1){
            {    
             header('location: userdata.php');
            }
            } else {
            echo "<script> alert('Incorrect details'); </script>";
            }
        }
    }
    else {
        echo "<script> alert('Incorrect old password'); </script>";
    }
}
//for fetch data
$id = $_SESSION['id'];

$sql = "SELECT *  FROM `userdata` WHERE `id` = '$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php

if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
?>
<?php
if (isset($_POST['Logout'])) {
  session_destroy();
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet"  href="./css/updatepass.css">
</head>
<?php include 'main.php';?>
<body>
<h1 >User Data <i class="fa-solid fa-user"></i> </h1>
  <h1>Update password</h1>
    <form id="Reset" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"> 
        <div class="input-group">
            <label>Old Password</label>
            <input type="text" id="oldpassword" name="oldpassword" value="" required>  
            <p id="oldpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>New password</label>
            <input type="text" id="Newpassword" name="Newpassword" required>
            <p id="newpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="text" id="confirmpassword" name="confirmpassword" required>
            <p id="confirmpass" style="color: red;"></p>
        </div>
        <div class="input-group">
        <button type="submit" class="btn" name="Reset">Reset</button>
        </div>
    </form>
 <!-- <script src="./js/updatepass.js"></script> -->
</body>
</html>