<?php include 'db.php';?>
<?php
session_start();
// delete data
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    // header('location: user_detail.php');

    $sql = "DELETE FROM `userdata` where id=$id";
    // echo $sql;
    // die;

    if (mysqli_query($conn, $sql)) {

        header('location: users.php');
    } else {
        echo "data not delete";
    }
}

?>
<?php
$conn = mysqli_connect("localhost", "root", "", "userdata") or die("connection failed");
$sql = "SELECT * FROM `userdata`;";
$result = mysqli_query($conn, $sql);

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


<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./js/searchdata.js"></script>

<link rel="stylesheet" href="./css/searchdata.css">
</head>
<?php include 'main.php';?>
<<body>
   
       <div class="main_content">
       <h1>Data_List</h1>
        </form>    
            <input id="myInput" type="text" placeholder="Search..">
                   <table>
                       <tr>
                           <th>id</th>
                           <th>username</th>
                           <th>number</th>
                           <th>email</th>
                           <th>edit</th>
                           <th>delete</th>
                           <th>reset_password</th>
                       </tr>
                       <tr>
                           <?php
      
                              $i = 1;
                              while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                           <td> <?php echo $i++; ?></td>
                           <td> <?php echo $row['username']; ?></td>
                           <td> <?php echo $row['email']; ?></td>
                           <td> <a href="profile.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">edit</a></td>
                           <td>
                           <form action="#" method="POST">
                               <button type="submit" class="btn" name="delete" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                  background: azure;
                                  border-radius: 7px;
                                  border: 1px solid grey;">delete</button>
                           </form>
                            </td>
                            <td> <a href="updatepss.php" class="btn btn-danger">reset</a></td>
                       </tr>
                        <?php
                           }
   
                        ?>
   
                    </table>
        </form>
</body>
