

<?php
  session_start();
  $id='';
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "userdata";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
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
 <link rel="stylesheet" href="./css/register.css">

</head>

<body>
    <div >
      <h1> Profile</h1>
    
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
         
       
          <!-- <button> update</button> -->
          <input type="submit" value="update" id="submit"  class="submit" />
          <input type="reset" value="reset"/>
          <p>
             <a href="login.php">Already registered</a>
          </p>
      </form>
    
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/register.js"></script>
</body>
</html>