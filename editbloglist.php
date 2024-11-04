
<?php

  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "customer";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
  
   
    if (isset($_POST["submit"])) {
      
      
      $name = $_POST['name'];
      
      $title = $_POST['title'];
      $id = $_POST['id'];
      $description = $_POST['description'];
      $createdate = $_POST['createdate'];
      $updatedate = $_POST['updatedate'];
      $deletestatus = $_POST['deletestatus'];
      $file = $_FILES['image']['name'];
     
        $file_name = str_replace(" ", "", $file);
        $tempname= $_FILES['image']['tmp_name'];
        $folder = 'image/'.$file_name;
      
      
    $sql = 'UPDATE `customer` SET `name` = "' . $name . '",`title` = "' . $title . '", `description` = "' . $description . '",
     `createdate` = "' . $createdate . '" , `updatedate` = "' .$updatedate . '", `deletestatus` = "' .$deletestatus . '" , `image` = "' .$file_name . '"WHERE `id` = "'. $id.'";';
     
    // print_r($sql); die;
    if (mysqli_query($conn, $sql)) {
      header('location: bloglist.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
  //for fetch data
  // $id = $_SESSION['id'];
  
  $id =isset($_GET['id'])?$_GET['id']:print_r(" ");

  $sql = "SELECT *  FROM `customer` WHERE `id` = '$id';";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $Updatetime=date('Y-m-d ');

?>
<?php

if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
?>
<?php
if (isset($_POST['update'])) {
  session_destroy();
  header('location: bloglist.php');
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
     
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" enctype="multipart/form-data" >
      <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"> 
      <div class="inputcontainer">
            <label for="name">NAME:</lable><br>
            <input type="text" name="name" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $row['name']; ?>"  /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
         <div class="inputcontainer">
            <lable for="Title"> Title:</lable><br>
            <input type="text" name="title" id="num" class="inputFieldRequired"  placeholder="" value="<?php echo $row['title']; ?>" data-errorid="#numerror" required/><br>
            <span id="numerror"  class="error" style="color: red;"></span><br>
         </div>
         
         <div class="inputcontainer">
            <lable for="Description">Description</lable> <br>
            <input type="textarea"name="description" id="email" class="inputFieldRequired" style="width:100%;height:30px;border:1px solid" placeholder="" value="<?php echo $row['description']; ?>" data-errorid="#emailerror" required/><br>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
        
         <div class="inputcontainer">
               <lable for="create date">Create date</lable> <br>
               <input type="text"name="createdate" id="password" placeholder="" value="<?php echo $row['createdate']; ?>" required/><br>
               <span id="passworderror"   class="error" style="color: red;"></span><br>
         </div>
         <div class="inputcontainer">
            <label for="update date">update date</lable><br>
            <input type="text" name="updatedate" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $row['updatedate']; ?>"  /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        <div class="inputcontainer">
            <label for="delete status">delete status</lable><br>
            <input type="text" name="deletestatus" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $row['deletestatus']; ?>"  /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        <div class="image1">
              <label>Image</label>
              <img src="<?php echo $row['image'] ?>"/>
              <input type="file" id="image" name="image"/>
              <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
          </div>
          
          
        <input type="submit" value="update" id="submit" name="submit"  class="submit" />
          
         
      </form>
   
      <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            editor.resize(300,500);
    </script>
    <script> CKEDITOR.replace('editor')</script>
    
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/updateprofile.js"></script> -->
</body>
</html>