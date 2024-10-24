<?php
session_start();

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "userdata";
   $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
   if (isset($_POST['oldpassword'])) {
   
       $oldpassword = $_POST['oldpassword'];
       $encryptpassword = sha1($oldpassword);
       
       $sql = "SELECT * FROM userdata WHERE password='$encryptpassword'";
   
       $result = mysqli_query($conn, $sql);
   
       $count = mysqli_num_rows($result);
       if ($count == 1) {
           $con = new mysqli($servername, $username, $password, $dbname);
   
           if (isset($_POST["Reset"])) {
               $oldpassword = $_POST['oldpassword'];
               $encryptpass = sha1($oldpassword);
               $password = $_POST['Newpassword'];
               $encryptpassword = sha1($password);
   
   
               $sql = "UPDATE `userdata` SET `password` = '$encryptpassword' WHERE `userdata`.`password` = '$encryptpass';";
               $results = mysqli_query($con, $sql);
               $count=mysqli_num_rows($result);
               if($count==1){
               {    
                  header('location: main.php');
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
  <h1>Update password</h1>
    <form id="Reset" method="post">
        <div class="input-group">
            <label>Old Password</label>
            <input type="text" id="oldpassword" name="oldpassword">
            <p id="oldpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>New password</label>
            <input type="text" id="Newpassword" name="Newpassword">
            <p id="newpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="text" id="confirmpassword" name="confirmpassword">
            <p id="confirmpass" style="color: red;"></p>
        </div>
        <div class="input-group">
        <button type="submit" class="btn" name="Reset">Reset</button>
        </div>
    </form>
 <script src="./js/updatepass.js"></script>
</body>
</html>