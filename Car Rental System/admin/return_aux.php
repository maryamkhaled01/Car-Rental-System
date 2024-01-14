<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_system";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get attributes values for query
$car_id = $_POST['car_id'];     //car_id from form
$cust_id=$_POST['cust_id'];     //cust_id from search.php
$res_date=$_POST['res_date'];   //cust_id from search.php
$now = date("Y-m-d H:i:s");     //finding time of reservation     

// SQL queries

$reservation_sql = "UPDATE reservation SET is_ret = '1',ret_date='$now' WHERE car_id='$car_id' and cust_id='$cust_id' and res_date='$res_date'";
$car_sql = "UPDATE car SET status = 'availabe' WHERE car_id='$car_id'";
$result1 = $conn->query($reservation_sql);
$result1 = $conn->query($car_sql);

// Display success message
header('Location:return.php');

// Close connection
$conn->close();
?>