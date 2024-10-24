<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./js/Filtered_table.js"></script>

<link rel="stylesheet" href="./css/Filtered_table.css">
</head>
<?php include 'main.php';?>
<body>

     <h2>Filterable Table</h2>
          <input id="myInput" type="text" placeholder="Search..">
          <br><br>
          <table>
                <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <tr>
                  <td>Anisha</td>
                  <td>Dhaka</td>
                  <td>a@example.com</td>
                </tr>
                <tr>
                  <td>Mary</td>
                  <td>Moe</td>
                  <td>m@mail.com</td>
                </tr>
                <tr>
                  <td>July</td>
                  <td>Dooley</td>
                  <td>j@greatstuff.com</td>
                </tr>
                <tr>
                  <td>Amrita</td>
                  <td>Ravendale</td>
                  <td>a_r@test.com</td>
                </tr>
          </table>
</body>
</html>
