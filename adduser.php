
<?php include 'db.php';?>
<?php
 
  if (isset($_POST['username']) && isset($_POST['password'])) 
  {
     // print_r($_POST);
      $username = $_POST['username'];
      $number = $_POST['num'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      // $encryptpass = sha1($password);
    //   $file = $_FILES['image']['name'];
      //   print_r($file);
      //   die;
        // $file_name = str_replace(" ", "", $file);
        // $tempname= $_FILES['image']['tmp_name'];
        // $folder = 'image/'.$file_name;
       
        // $encryptpass = sha1($password);
        // $needheight = 150;
        // $needwidth = 200;
    
        // $arrtest = getimagesize($tempname);
    
        //  $actualwidth = $arrtest[0];
        //  $actualheight = $arrtest[1];
        //  if($needwidth > $actualwidth && $needheight > $actualheight){
  
        $sql="INSERT INTO userdata (username, number, email, password)
         VALUES ('$username','$number','$email','$password ')";
   
   $result = mysqli_query($conn, $sql);
   if(isset($_SESSION['username'])){
       header("location:userdata.php");

   }
   else{
       echo"file not upload";
   }
}
// else{ $error = "size should be width=200px height=150px";
// }




  // $conn->close();

?>   
<html>
 <head>
 <link rel="stylesheet" href="./css/register.css">

</head>
<?php include 'main.php';?>
<body>
    <div >
      <h1> ADD USER </h1>
      <form  name="form" method="post"  id="form"  onsubmit="return validateForm()" enctype="multipart/form-data">
            
         <div class="inputcontainer">
            <label for="username">NAME:</lable><br>
            <input type="text" name="username" id="username" class="inputFieldRequired" placeholder="enter your name" value="" data-errorid="#usernameerror" /><br>
            <span id="usernameerror"  class="error" style="color: red;"></span><br>
        </div> 
         <div class="inputcontainer">
            <lable for="number"> Number:</lable><br>
            <input type="text" name="num" id="num" class="inputFieldRequired"  placeholder="enter your number" value="" data-errorid="#numerror" required/><br>
            <span id="numerror"  class="error" style="color: red;"></span><br>
         </div>
         
         <div class="inputcontainer">
            <lable for="email">E-mail:</lable> <br>
            <input type="email"name="email" id="email" class="inputFieldRequired"  placeholder="enter your email" value="" data-errorid="#emailerror" required/><br>
            <span id="emailerror"  class="error" style="color: red;"></span><br>  
        </div>
          
         <div class="inputcontainer">
               <lable for="password">Password:</lable> <br>
               <input type="password"name="password" id="password" placeholder="" value=""/ required><br>
               <span id="passworderror"   class="error" style="color: red;"></span><br>
         </div>
         <!-- <div class="inputcontainer">
              <label for="image">Image</label><br>
              <input type="file" id="image" name="image"/>
              <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
         </div><br> -->
          
          <input type="submit" value="added" id="submit"  class="submit" />
          
         
      </form>
    
</div>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            editor.resize(300,500);
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script> 
<script src="./js/register.js"></script>
</body>
</html>