<?php
echo "Hii";

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

// Get data 
$cust_id=$_POST['cust_id'];
$car_id=$_POST['car_id'];
echo $car_id;
$res_date=$_POST['res_date'];
$amount=$_POST['amount'];
$now = date("Y-m-d H:i:s");     // finding time of payment 

// Perform SQL query
$pay_sql = "INSERT INTO payment (`cust_id`, `car_id`,`res_date`,`pay_date`,`total_amount`) VALUES ('$cust_id', '$car_id','$res_date','$now','$amount')";
$result2 = $conn->query($pay_sql);

$res_sql = "UPDATE `reservation` SET `isPaid` = '1' WHERE car_id='$car_id' and cust_id='$cust_id' and res_date='$res_date'"; 
$result = $conn->query($res_sql);
// Close connection
$conn->close();
header('Location:reservations.php');

?>