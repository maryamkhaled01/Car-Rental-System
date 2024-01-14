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
$carId = $_SESSION['car_id'];       //car_id from form
$cust_id=$_SESSION['cust_id'];  //cust_id from search.php
$now = date("Y-m-d H:i:s");     // finding time of reservation 
$loc_id = $_POST['loc_id'];       

// SQL queries

$Insert_sql = "INSERT INTO reservation (`cust_id`, `car_id`,`res_date`,`pickup_loc`,`is_ret`,`picked_up`,`isPaid`) VALUES ('$cust_id', '$carId','$now','$loc_id','0','0','0')";
$result2 = $conn->query($Insert_sql);

$Update_sql = "UPDATE car SET status = 'reserved' WHERE car_id=$carId";
$result1 = $conn->query($Update_sql);

// Display success message
echo "Renting done successfully for ";
header('Location:reservations.php');

// Close connection
$conn->close();
?>