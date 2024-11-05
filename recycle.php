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
// fetch  data
$con = mysqli_connect("localhost", "root", "", "customer") or die("connection failed");

$limit = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_serial = $limit * ($page - 1) + 1;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM `customer` where recycle=0 LIMIT {$offset},{$limit}"  ;
$result = mysqli_query($con, $sql);

?>
     <?php
    // recycle data
        if (isset($_POST['recycle'])) {
            $id = $_POST['recycle'];
            // $_SESSION['statusid'] ="$id";

            $sql = 'UPDATE `customer` SET `recycle` = "' . 1 . '" WHERE `customer`.`id` = ' . $id;
            if (mysqli_query($con, $sql)) {
                header("Refresh:0");

            } else {
                echo "data not recycle";
            }
        }
        ?>
<?php
    // delete data
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            // $_SESSION['statusid'] ="$id";

            $sql = "DELETE FROM `customer` where id=$id";
            if (mysqli_query($con, $sql)) {
                header("Refresh:0");

            } else {
                echo "data not delete";
            }
        }
        ?>
   
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="./css/recycle.css">

    <?php include('main.php') ?>

    <div class="main_content">
            <h1 >Bloglist_recycle <i class="fa-solid fa-user"></i> 
             <button class="log_btn"><a href="bloglist.php"><i class="fa-solid fa-right-from-bracket"></i></a></button>
              <div class="header"
                style=" background: white">
              
                     <table>
                        <tr>
                        <th>id</th>
                        <th>name</th>
                           <th>title</th>
                           <th>description</th>
                           <th>create date</th>
                           <th>update date</th>
                           <th>delete status</th>
                           <th>recycle</th>
                           <th>delete</th>
                           <th>image</th>
             
                        </tr>
                        <tr>
                        <?php
                         while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <td> <?php echo $start_serial++; ?></td>
                               <td> <?php echo $row['name']; ?></td>
                               <td> <?php echo $row['title']; ?></td>
                               <td> <?php echo $row['description']; ?></td>
                               <td> <?php echo $row['createdate']; ?></td>
                               <td> <?php echo $row['updatedate']; ?></td>
                               <td> <?php echo $row['deletestatus']; ?></td>
                               <td>
                                    <form action="" method="POST">
                                       <button type="submit" class="btn" name="recycle" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                          background: azure;
                                          border-radius: 7px;
                                          border: 1px solid grey;">Restore</button>
                                   </form>
                                   </td>   
                               <td>
                                <form action="#" method="POST">
                                    <button type="submit" class="btn" name="delete" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                       background: azure;
                                       border-radius: 7px;
                                       border: 1px solid grey;">delete</button>
                                </form>
                               </td>
                               <td> <img src="image/<?php echo $row['image'] ?>"/></td>
                        </tr>
                        <?php
                            }
                    ?>

                    </table>
                    <?php
                            $sql1 = "SELECT * FROM `customer` where recycle=0";
                            $result1 = mysqli_query($con, $sql1) or die("Query failed");
                            if (mysqli_num_rows($result1) > 0) {
                                $total_record = mysqli_num_rows($result1);

                                $total_page = ceil($total_record / $limit);
                                echo '<div class="pagination">';
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $page) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }
                                    echo '<a class="' . $active . '" href="recycle.php?page=' . $i . '">' . $i . '</a>';
                                }
                                echo '</div>';
                            }
                            ?>
                </div>
            </div>
        </div>
    
</div>
<img src="image/<?php echo $row['image'] ?>"/>