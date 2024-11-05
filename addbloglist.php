
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

$error = '';

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "customer";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
  $error="";
  if (isset($_POST['name'])) 
  {
     // print_r($_POST);
    //   $id = $_POST['id'];
      $name = $_POST['name'];
      $title = $_POST['title'];
      $description = $_POST['content'];
      $createdate = $_POST['createdate'];
      $updatedate = $_POST['updatedate'];
      $deletestatus = $_POST['deletestatus'];
      $file = $_FILES['image']['name'];
    //   print_r($file);
    //   die;
      $file_name = str_replace(" ", "", $file);
      $tempname= $_FILES['image']['tmp_name'];
      $folder = 'image/'.$file_name;
     
      // $encryptpass = sha1($password);
      $needheight = 500;
      $needwidth = 500;
  
      $arrtest = getimagesize($tempname);
  
       $actualwidth = $arrtest[0];
       $actualheight = $arrtest[1];
       if($needwidth > $actualwidth && $needheight > $actualheight){
        $sql="INSERT INTO `customer`( `name`, `title`, `description`, `createdate`, `updatedate`, `deletestatus`, `image`)
         VALUES ('$name','$title','$description','$createdate','$updatedate','$deletestatus','$folder')";

        //  echo $sql;die;
                 
                 $result = mysqli_query($conn, $sql);
                 if(move_uploaded_file($tempname,$folder)){
                     header("location:bloglist.php");
              
                 }
                 else{
                     echo"file not upload";
                 }
        }
        else{ $error = "size should be width=200px height=150px";
        }


  } 


$updatedate=date('Y-m-d ');
$createdate=date('Y-m-d ');
?>  
<html>
 <head>
 <link rel="stylesheet" href="./css/register.css">

</head>
<?php include 'main.php';?>
<body>
    <div >
      <h1> Add_Blog_user  </h1>
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" enctype="multipart/form-data">
            
         <div class="inputcontainer">
            <label for="name">NAME:</lable><br>
            <input type="text" name="name" id="name" class="inputFieldRequired" placeholder="" value="" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
         <div class="inputcontainer">
            <lable for="Title"> Title:</lable><br>
            <input type="text" name="title" id="num" class="inputFieldRequired"  placeholder="" value="" data-errorid="#numerror" required/><br>
            <span id="numerror"  class="error" style="color: red;"></span><br>
         </div>
         
         <div class="inputcontainer">
            <lable for="Description">Description</lable> <br>
            <textarea name="content" id="editor" ></textarea>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
          
        

         <div class="inputcontainer">
               <lable for="create date">Create date</lable> <br>
               <input type="text"name="createdate" id="password" placeholder="" value="<?php echo $createdate ?>" required/><br>
               <span id="passworderror"   class="error" style="color: red;"></span><br>
         </div>
         <div class="inputcontainer">
            <label for="update date">update date</lable><br>
            <input type="text" name="updatedate" id="name" class="inputFieldRequired" placeholder="" value="<?php echo $updatedate ?>" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        <div class="inputcontainer">
            <label for="delete status">delete status</lable><br>
            <input type="text" name="deletestatus" id="name" class="inputFieldRequired" placeholder="" value="" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        <div class="inputcontainer">
              <label for="image">Image</label><br>
              <input type="file" id="image" name="image"/>
              <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
         </div><br>
       
          
          <input type="submit" value="added" id="submit"   class="submit" />
          
         
      </form>
     
</div>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            editor.resize(500,500);
</script>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/register.js"></script> -->
</body>
</html>