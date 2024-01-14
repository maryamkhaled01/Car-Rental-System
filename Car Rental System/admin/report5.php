<?php
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

// Get search type and query from the request
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
}

// Perform SQL query
$sql = "SELECT * FROM  payment WHERE (pay_date >= '$startDate' AND pay_date <= '$endDate');"; ///////////////////////////////////////////////////////////////////
$result = $conn->query($sql);

// Display search results
if ($result->num_rows > 0) {
    echo "<style>
    table,th,tr, td {
        margin: auto;
    }
    </style>";
    echo "<table>
        <tr>
          <th>Car ID</th>
          <th>Customer ID</th>
          <th>Reservation Date </th>
          <th>Payment Date </th>
          <th>Total Amount</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["car_id"]."</td>
            <td>".$row["cust_id"]."</td>
            <td>".$row["res_date"]."</td>
            <td>".$row["pay_date"]."</td>
            <td>".$row["total_amount"]."</td>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

// Close connection
$conn->close();
?>
