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
$status = $_POST['status'];     //car_id from form

// SQL queries

$Update_sql = ($status=='out of service') ? "UPDATE car SET status = 'available' WHERE car_id='$car_id'" : "UPDATE car SET status = 'out of service' WHERE car_id='$car_id'";
// "UPDATE car SET status = 'out of service' WHERE car_id='$car_id'";
$result1 = $conn->query($Update_sql);

// Display success message
header('Location:fix.php');

// Close connection
$conn->close();
?>