
<?php include 'db.php';?>
<?php
    if (isset($_POST['username']) && isset($_POST['password'])) 
  {
     // print_r($_POST);
      $id = $_POST['id'];
      $username = $_POST['username'];
      $number = $_POST['num'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $encryptpass = sha1($password);
  
  
        // $sql="INSERT INTO userdata (username, number, email, password)
        //  VALUES ('$username','$number','$email','$encryptpass ')";
   
     if (mysqli_query($conn, $sql)) {
        header('location: login.php'); 
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  
  
  }
//   $conn->close();
 //for fetch data
$id = $_SESSION['id'];

$sql = "SELECT *  FROM `userdata` WHERE `id` = '$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// print_r($row);
// die;

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
<?php
if (isset($_POST['submit'])) {
  // session_destroy();
  header('location: login.php');
}
    
?>     

<html>
 <head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="./css/profile.css">

</head>
<?php include 'main.php';?>
<body>
    <div class="border" >
        
            <h4 class="cancel">Cancel</h4>
    <h3 class="edit"> Edit Profile </h3>
    <h4 class="done">Done</h4>

      <h1 class="image">  <img src="girl.png" alt="NOIMAGE"/></h1>
      <h3 > <a href="image/default.png">Change Profile Photo </a></h3>
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" >
      <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
         <div class="inputcontainer">
            <label for="username">NAME:</lable>
            <input type="text" name="username" id="username" class="inputFieldRequired" placeholder="enter your name" value="<?php echo $row['username']; ?>" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
         <div class="inputcontainer">
            <lable for="number"> Number:</lable>
            <input type="text" name="num" id="num" class="inputFieldRequired"  placeholder="enter your number" value="<?php echo $row['number']; ?>" data-errorid="#numerror"/><br>
            <span id="numerror"  class="error" style="color: red;"></span><br>
         </div>
         
         <div class="inputcontainer">
            <lable for="email">E-mail:</lable> 
            <input type="email"name="email" id="email" class="inputFieldRequired"  placeholder="enter your email" value="<?php echo $row['email']; ?>" data-errorid="#emailerror"/><br>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
        <div class="change">
        <lable for="bio">Bio:</lable> 
        <textarea> Enjoying the simple things in life. </textarea>
        
          <!-- <input type="submit" value="update" id="submit"  class="submit" />
          <input type="reset" value="reset"/>
          <p>
             <a href="login.php">Already registered</a>
          </p> -->
      </form>
     
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/profile.js"></script>
</body>
</html>