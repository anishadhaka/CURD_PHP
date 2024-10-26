<?php include 'db.php';?>
<?php
 
  $id='';
    if (isset($_POST["submit"])) {
      
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $number = $_POST['num'];
 

    $sql = 'UPDATE `userdata` SET `username` = "' . $username . '",`email` = "' . $email . '", `number` = "' . $number . '" WHERE `id` = ' . $id;
    // print_r($sql); die;
    if (mysqli_query($conn, $sql)) {
       
        header('location:userdata.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
  //for fetch data
  // $id = $_SESSION['id'];
  $id = $_GET['id'];

  $sql = "SELECT *  FROM `userdata` WHERE `id` = '$id';";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


?>
<?php

if (!isset($_SESSION['username'])) {
  header('location: userdata.php');
}
?>
<?php
if (isset($_POST['update'])) {
  session_destroy();
  header('location: userdata.php');
}
?>
  
<html>
 <head>
 <link rel="stylesheet" href="./css/updateprofile.css">

</head>
<?php include 'main.php';?>
<body>
<h1 >User Data <i class="fa-solid fa-user"></i> </h1>
    <div >
      <h1> Update Profile</h1>
     
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" >
      <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"> 
         <div class="inputcontainer">
            <label for="username">NAME:</lable><br>
            <input type="text" name="username" id="username" class="inputFieldRequired" placeholder="enter your name" value="<?php echo $row['username']; ?>" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
         <div class="inputcontainer">
            <lable for="number"> Number:</lable><br>
            <input type="text" name="num" id="num" class="inputFieldRequired"  placeholder="enter your number" value="<?php echo $row['number']; ?>" data-errorid="#numerror"/><br>
            <span id="numerror"  class="error" style="color: red;"></span><br>
         </div>
         
         <div class="inputcontainer">
            <lable for="email">E-mail:</lable> <br>
            <input type="email"name="email" id="email" class="inputFieldRequired"  placeholder="enter your email" value="<?php echo $row['email']; ?>" data-errorid="#emailerror"/><br>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
          <input type="submit" value="update" id="submit" name="submit"  class="submit" />
          

      </form>
    
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/updateprofile.js"></script>
</body>
</html>