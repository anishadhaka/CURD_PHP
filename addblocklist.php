

<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "customer";
  $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
  if (isset($_POST['name'])) 
  {
     // print_r($_POST);
    //   $id = $_POST['id'];
      $name = $_POST['name'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $createdate = $_POST['createdate'];
      $updatedate = $_POST['updatedate'];
      $deletestatus = $_POST['deletestatus'];
     
      // $encryptpass = sha1($password);
  
  
        $sql="INSERT INTO `customer`( `name`, `title`, `description`, `createdate`, `updatedate`, `deletestatus`)
         VALUES ('$name','$title','$description','$createdate','$updatedate','$deletestatus')";
   
     if (mysqli_query($conn, $sql)) {
        header('location: blocklist.php'); 
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  
  }
  $conn->close();

?>   
<html>
 <head>
 <link rel="stylesheet" href="./css/register.css">

</head>
<?php include 'main.php';?>
<body>
    <div >
      <h1> Add_Blog_user  </h1>
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" >
            
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
            <input type="text"name="description" id="email" class="inputFieldRequired"  placeholder="" value="" data-errorid="#emailerror" required/><br>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
          
         <div class="inputcontainer">
               <lable for="create date">Create date</lable> <br>
               <input type="text"name="createdate" id="password" placeholder="" value="" required/><br>
               <span id="passworderror"   class="error" style="color: red;"></span><br>
         </div>
         <div class="inputcontainer">
            <label for="update date">update date</lable><br>
            <input type="text" name="updatedate" id="name" class="inputFieldRequired" placeholder="" value="" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        <div class="inputcontainer">
            <label for="delete status">delete status</lable><br>
            <input type="text" name="deletestatus" id="name" class="inputFieldRequired" placeholder="" value="" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
        
       
          
          <input type="submit" value="added" id="submit"  class="submit" />
          
         
      </form>
    
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/register.js"></script> -->
</body>
</html>