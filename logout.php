 <?php
        session_start();
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
<?php
       if (isset($_POST['updatepass'])) {
         header('location: updatepass.php');
       }
?>


<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="./css/logout.css">
</head>
     <?php include 'main.php';?>
<body>
  
  <form align="right" method="post">
     <button class="btn" name="Logout">logout</button>
     <button  class="btn" name="updatepass">Update Password</button>
    </form>
</body>
</html>