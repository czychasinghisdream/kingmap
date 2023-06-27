<?php
session_start();

include("db.php"); // Assuming the database connection is established in the "db.php" file

if (isset($_GET['rn'])) {
    $id = $_GET['rn'];
    
    // Construct the SQL query
    $query = "DELETE FROM tbl_reg WHERE id = '$id'";
    
    // Execute the query
    mysqli_query($con, $query);
    
    // Check the affected rows to determine if the deletion was successful
    $affectedRows = mysqli_affected_rows($con);
    if ($affectedRows > 0) {
        echo "<script>alert('Deletion successful');</script>";
        header('location: registereduser.php'); // Redirect back to the previous page
    } else {
        echo "<script>alert('Deletion failed');</script>";
        header('location: registereduser.php'); // Redirect back to the previous page
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="table.css">
</head>
<body>
    <body background="skies.jpeg"  style="background-size: cover;" style="filter: brightness(4px);">
        <div class="nav">
            <h2>IsabelaTouristSpot</h2>
           <ul>
              
              
               <li> <a href="homepage.php">HOME </a></li>
               <li> <a href="">ABOUT </a></li>
               <li> <a href="home.php">REGISTRATION </a></li>
               
           </ul>
        
        </div>
           <div class="table-rows">
            <h1>All REGISTERED USERS</h1>
           <table border="1" width="700"  >
            <tr>
                <td> ID</td>
                <td> Contact</td>
                <td> Name </td>
                <td> Password </td>
                <td> Operation</td>
               
           </tr>

           <?php
            $con = mysqli_connect('localhost','root','','isabelamap');
            $query = "SELECT * FROM tbl_reg ORDER BY id";
            $query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    foreach($query_run as $row) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['contact'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['pass'] ?></td>
            <td> <a href= "registereduser.php?rn= <?= $row['id']  ?> " class ="delete">Delete </a></td>
        </tr>
        <?php
    }
}
?>      
           </table>
           </div>
</body>
</html>