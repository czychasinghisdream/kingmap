<?php

session_start();

include("db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $contact = $_POST['contact'];
    $name = $_POST['name'];
    $password= $_POST ['Password'];

$duplicateName = mysqli_query($con, "SELECT * FROM tbl_reg WHERE name = '$name'");
if (mysqli_num_rows($duplicateName) > 0) {
    echo "<script type='text/javascript'> alert('Name already registered!');</script>";
} elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM tbl_reg WHERE contact = '$contact'")) > 0) {
    echo "<script type='text/javascript'> alert('Contact number already registered!');</script>";
} else {
    $query = "INSERT INTO tbl_reg (contact, name, pass) VALUES ('$contact', '$name', '$password')";
    mysqli_query($con, $query);
    echo "<script type='text/javascript'> alert('Successfully registered');</script>";
}
     
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> 
</head>
<body>
        
    <body background="skies.jpeg"  style="background-size: cover;" style="filter: brightness(4px);">
        <div class="nav">
           <h2>Isabela TouristSpot</h2>
           <ul>
              
              
               <li> <a href="homepage.php">HOME </a></li>
               <li> <a href="">ABOUT </a></li>
               <li> <a href="login.php">LOGIN </a></li>
           </ul>
         
        </div>
       <div class="contform">

        <h1>REGISTER NOW!</h1>
        <div class="form">
           <form method="POST">
            <label for=""> Contact</label>
            <input type="text" name="contact" placeholder="please enter your Number." required>
            <br>
            <label for=""> Name</label>
            <input type="text" name="name"placeholder="please enter your Name". required>
            <br>
            <label for=""> Password</label>
            
            <input type="text" name="Password" placeholder="please enter your Password." required>
             <br>
             <br>
            <input type="submit" name="" value=" REGISTER" >
           </form>

        </div>
       </div>
</body>
</html>