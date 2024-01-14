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


// Perform SQL query
$sql = "SELECT car_id, plate_id, model, status FROM  car;"; ///////////////////////////////////////////////////////////////////
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
          <th>PLate ID</th>
          <th>Model </th>
          <th>Status</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["car_id"]."</td>
            <td>".$row["plate_id"]."</td>
            <td>".$row["model"]."</td>
            <td>".$row["status"]."</td>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

// Close connection
$conn->close();
?>
