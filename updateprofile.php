<?php include 'db.php';?>
<?php
 
  $id='';
    if (isset($_POST["submit"])) {
      
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $number = $_POST['num'];
    // $file = $_FILES['image']['name'];
     
    // $file_name = str_replace(" ", "", $file);
    // $tempname= $_FILES['image']['tmp_name'];
    // $folder = 'image/'.$file_name;
    

    $sql = 'UPDATE `userdata` SET `username` = "' . $username . '",`email` = "' . $email . '", `number` = "' . $number . '" WHERE `id` = ' . $id;
    
    // print_r($sql); die;
    if (mysqli_query($conn, $sql)) {
       
        header('location:updateprofile.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
  //for fetch data
  // $id = $_SESSION['id'];
  $id =isset($_GET['id'])?$_GET['id']:print_r(" ");

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
  header('location: userdata .php');
}
?>
  
<html>
 <head>
 <link rel="stylesheet" href="./css/updateprofile.css">

</head>
<?php include 'main.php';?>
<body>
<div> 
          <button class="button"><a href="userdata.php" style="color:black;align:right;"> <i class="fa-solid fa-right-from-bracket fa-rotate-180""></i></a></button> 
         </div> 
<h1 >User Data <i class="fa-solid fa-user"></i> </h1>
    <div >
      <h1> Update Profile</h1>
     
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()"   enctype="multipart/form-data">
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

        <!-- <div class="image1">
              <label>Image</label>
              <img src="<?php echo $row['image'] ?>"/>
              <input type="file" id="image" name="image"/>
              <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
          </div> -->
          
          <input type="submit" value="update" id="submit" name="submit"  class="submit" />
          

      </form>
    
</div>
<!-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            editor.resize(300,500);
    </script>
    <script> CKEDITOR.replace('editor')</script> -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/updateprofile.js"></script>
</body>
</html>