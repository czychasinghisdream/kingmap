


<?php

session_start();

include("db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $contact = $_POST['contact'];
    $password= $_POST ['Password'];

    
    $lagaysaloob = mysqli_query($con,"SELECT *FROM tbl_reg where contact = '$contact' && pass = '$password'");


    if(mysqli_num_rows($lagaysaloob)>0){
        echo"<script type = 'text/javascript'> alert ('LOGGED IN SUCCESSFULY') </script>";
        header('location: index.html');
     
    } 
      else if ($contact != ['contact'])
    {
       
        echo"<script type = 'text/javascript'> alert ('Login Failed') </script>";
        

        
    } 
        else if ($password != ['Password']) 
    {   
        
        echo"<script type = 'text/javascript'> alert ('Password incorrect') </script>";
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
</head>
<body>
        
    <body background="skies.jpeg"  style="background-size: cover;" style="filter: brightness(4px);">
        <div class="nav">
           <h2>Isabela TouristSpot</h2>
           <ul>
              
              
               <li> <a href="home.php">HOME </a></li>
               <li> <a href="">ABOUT </a></li>
               
               <li> <a href="home.php">REGISTER NOW </a></li>
           </ul>
         
        </div>
       <div class="contform">

        <h1>LOGIN</h1>
        <div class="form">
           <form method="POST">
            <label for=""> Contact</label>
            <input type="text" name="contact" placeholder="please enter your Number." required>
            <br>
         
            <label for=""> Password</label>
            <input type="text" name="Password" placeholder="please enter your Password." required>

             <br>
             <br>
            <input type="submit" name="" value=" LOGIN" >
           </form>

        </div>
       </div>
</body>
</html>