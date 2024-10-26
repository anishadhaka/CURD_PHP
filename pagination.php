<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "userdata") or die("connection failed");
// delete data
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    header('location: userdata.php');

    $sql = "DELETE FROM `userdata` where id=$id";
    // echo $sql;
    // die;

    if (mysqli_query($conn, $sql)) {

        header('location: userdata.php');
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
<?php
// fetch  data
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_serial = $limit * ($page - 1) + 1;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM `userdata` LIMIT {$offset},{$limit}";
$result = mysqli_query($conn, $sql);

?>


<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/userdata.css">
<?php include 'main.php';?>

<body>
   
       <div class="main_content">
            <h1 >User Data <i class="fa-solid fa-user"></i> 
            <button class="add-btn"><a href="adduser.php">  ADD USER <i class="fa-solid fa-plus"></i></a></button></h1>
            <!-- <button class="logout-btn"><a href="main.php"><i class="fa-solid fa-right-from-bracket"></i></a></button> -->
                   <table class="center">
                       <tr>
                           <th>id</th>
                           <th>username</th>
                           <th>number</th>
                           <th>email</th>
                           <th>password</th>
                           <th>update</th>
                           <th>delete</th>
                           <th>reset_password</th>
                       </tr>
                       <tr>
                           <?php
   
                           $i = 1;
                           while ($row = mysqli_fetch_assoc($result)) {
   
                           ?>
                               <td> <?php echo $start_serial++; ?></td>
                               <td> <?php echo $row['username']; ?></td>
                               <td> <?php echo $row['number']; ?></td>
                               <td> <?php echo $row['email']; ?></td>
                               <td> <?php echo $row['password']; ?></td>
                               <td> <a href="updateprofile.php?id=<?php echo $row['id'] ?>" class=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                               <td>
                                   <form action="#" method="POST">
                                       <button type="submit" class="btn" name="delete" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                          background: azure;
                                          border-radius: 7px;
                                          border: 1px solid grey;"><i class="fa-solid fa-trash"></i></button>
                                   </form>
                               </td>
                               <td> <a href="updatepass.php" class=""><i class="fa-solid fa-c"></i></a></td>
                       </tr>
                   <?php
                           }
                           ?>
                      </table>          
                      <?php
                $sql1 = "SELECT * FROM `userdata`";
                $result1 = mysqli_query($conn, $sql1) or die("Query failed");
                if (mysqli_num_rows($result1) > 0) {
                    $total_record = mysqli_num_rows($result1);

                    $total_page = ceil($total_record / $limit);
                    echo '<div class="pagination">';
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "activee";
                        } else {
                            $active = "";
                        }
                      
                        echo '<a class="' . $active . '" href="pagination.php?page=' . $i . '">' . $i . '</a>';
                    }
                    echo '</div>';
                }
                ?>
         
       </div>
  
</body>