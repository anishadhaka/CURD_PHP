
<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "customer";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
   $id="";
    if (isset($_POST["submit"])) {
      
      $name = $_POST['name'];
      $title = $_POST['title'];
      $id = $_POST['id'];
      $description = $_POST['description'];
      $createdate = $_POST['create date'];
      $updatedate = $_POST['update date'];
      $deletestatus = $_POST['delete status'];
      
    
 

    $sql = 'UPDATE `customer` SET `name` = "' . $name . '",`title` = "' . $title . '", `description` = "' . $description . '",
     `create date` = "' . $createdate . '" , `update date` = "' .$updatedate . '" WHERE `id` = ' . $id;
    print_r($sql); die;
    if (mysqli_query($conn, $sql)) {
       
        header('location:blocklist.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
  //for fetch data
  // $id = $_SESSION['id'];
  $id = $_GET['id'];

  $sql = "SELECT *  FROM `customer` WHERE `id` = '$id';";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

?>
<?php

if (!isset($_SESSION['name'])) {
  header('location: blocklist.php');
}
?>
<?php
if (isset($_POST['update'])) {
  session_destroy();
  header('location: blocklist.php');
}
?>
  
<html>
 <head>
 <link rel="stylesheet" href="./css/updateprofile.css">

</head>
<?php include 'main.php';?>
<body>
<h1 >blog_data <i class="fa-solid fa-user"></i> </h1>
    <div >
      <h1> Update blog_data</h1>
     
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" >
      <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"> 
      <div class="inputcontainer">
            <label for="name">NAME:</lable><br>
            <input type="text" name="name" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $row['name']; ?>" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
         <div class="inputcontainer">
            <lable for="Title"> Title:</lable><br>
            <input type="text" name="title" id="num" class="inputFieldRequired"  placeholder="" value="<?php echo $row['title']; ?>" data-errorid="#numerror" required/><br>
            <span id="numerror"  class="error" style="color: red;"></span><br>
         </div>
         
         <div class="inputcontainer">
            <lable for="Description">Description</lable> <br>
            <input type="text"name="description" id="email" class="inputFieldRequired"  placeholder="" value="<?php echo $row['description']; ?>" data-errorid="#emailerror" required/><br>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
          
         <div class="inputcontainer">
               <lable for="create date">Create date</lable> <br>
               <input type="text"name="create date" id="password" placeholder="" value="<?php echo $row['create data']; ?>" required/><br>
               <span id="passworderror"   class="error" style="color: red;"></span><br>
         </div>
         <div class="inputcontainer">
            <label for="update date">update date</lable><br>
            <input type="text" name="update date" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $row['update data']; ?>" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        <div class="inputcontainer">
            <label for="delete status">delete status</lable><br>
            <input type="text" name="delete status" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $row['delete status']; ?>" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        
       
          
        <input type="submit" value="update" id="submit" name="submit"  class="submit" />
          
         
      </form>
    
    
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/updateprofile.js"></script> -->
</body>
</html>