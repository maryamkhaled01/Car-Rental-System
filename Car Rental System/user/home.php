<?php
    session_start();
    $custId=$_SESSION['cust_id'];
?>

<html>
    <head>
        <title>
          Car Rental Website
        </title>
        <link rel="stylesheet" href="../home_style.css">
    </head>
    <body>
        <div class="container">
            <div class="toppage">
                <h1> Car Rental Website </h1>
            </div>
            <div class="topnav">
                <a class="active" href="home.html">Home</a>
                <a href="search.php">Reserve a car</a>
                <a href="reservations.php">My Reservations</a>
            </div>
            <img src="../car.jpg" style="object-fit:fill; width:1688px;"/>
            <div class="top-centered"><h1 style="font-size:90px">Rent Your<br/>Dream Car</h1></div>
        </div>
        <div class="bottompage" style="background-color: rgb(7, 16, 44); background-size: cover;">
        </div>
    </body>
</html>