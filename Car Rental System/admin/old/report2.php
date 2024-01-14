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
    $carPlate = $_POST['car_plate'];
}

// Perform SQL query
$sql = "SELECT * FROM  car natural join reservation WHERE ((res_date >= '$startDate' AND res_date <= '$endDate') AND (plate_id = '$carPlate'));"; ///////////////////////////////////////////////////////////////////
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
          <th>PLate ID</th>
          <th>Model </th>
          <th>Year </th>
          <th>Color </th>
          <th>Price/Hour </th>
          <th>Reservation Date </th>
          <th>Pickedup </th>
          <th>Pickup Date </th>
          <th>Pickup Location </th>
          <th>Returned </th>
          <th>Return Date </th>
          <th>Paid </th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["plate_id"]."</td>
            <td>".$row["model"]."</td>
            <td>".$row["year"]."</td>
            <td>".$row["color"]."</td>
            <td>".$row["price_per_hour"]."</td>
            <td>".$row["res_date"]."</td>
            <td>".$row["picked_up"]." </td>
            <td>".$row["pickup_date"]."</td>
            <td>".$row["pickup_loc"]."</td>
            <td>".$row["is_ret"]."</td>
            <td>".$row["ret_date"]."</td>
            <td>".$row["isPaid"]."</td>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

// Close connection
$conn->close();
?>
