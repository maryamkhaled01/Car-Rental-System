<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <link rel="stylesheet" href="../home_style.css">
    <style >
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url(../car.jpg);
        }
        #search-form {
            display: flex;
            max-width: 400px;
            margin: auto;
        }
        #search-input {
            flex: 1;
            padding: 10px;
        }
        #search-button {
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            border: none;
        }
        #search-type {
            margin-left: 10px;
            padding: 10px;
        }
        #search-results {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
    </style>
</head>
<body style="margin: 0px;">
        <div class="toppage" style="width: 100%; padding: 0px;">
            <h1>My Reservations</h1>
        </div>

        <div class="topnav" style="width: 100%; padding: 0px;">
            <a href="home.php">Home</a>
            <a href="search.php">Reserve a car</a>
            <a class="active" href="reservations.php">My Reservations</a>
            <!-- <a href="user/signup.php">Sign Up</a> -->
        </div>

        <?php
            session_start();
            $cust_id=$_SESSION['cust_id'];
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
            $sql = "SELECT c.car_id,c.plate_id, c.model,c.color,c.price_per_hour,r.res_date,r.pickup_date,r.ret_date, HOUR(TIMEDIFF(r.ret_date, r.pickup_date)) * c.price_per_hour as amount FROM car as c NATURAL JOIN reservation as r WHERE r.cust_id=$cust_id and r.isPaid='0'"; 
            $result = $conn->query($sql);

            // Display search results
            if ($result->num_rows > 0) {

                echo "<table border='1' style='color:white;'>";
                echo "<tr><th>plate ID</th><th>model</th><th>color</th><th>price/hour</th><th>res date</th><th>pick up date</th><th>return date</th><th>amount to be paid</th><th>pay</th></tr>";

                while($row = $result->fetch_assoc()) {
                    $disabled = ($row["ret_date"]=='') ? 'disabled' : '';
                    echo "<tr>";
                    echo "<td>" . $row["plate_id"] . "</td>";
                    echo "<td>" . $row["model"] . "</td>";
                    echo "<td>" . $row["color"] . "</td>";
                    echo "<td>" . $row["price_per_hour"] . " $</td>";
                    echo "<td>" . $row["res_date"] . "</td>";
                    echo "<td>" . $row["pickup_date"] . "</td>";
                    echo "<td>" . $row["ret_date"] . "</td>";
                    echo "<td>" . $row["amount"] . "</td>";
                    echo "<form action='pay.php' method='post'>";
                    echo "<input type='hidden' name='car_id' value='" . $row["car_id"] . "'>";
                    echo "<input type='hidden' name='cust_id' value='" . $cust_id . "'>";
                    echo "<input type='hidden' name='res_date' value='" . $row["res_date"] . "'>";
                    echo "<input type='hidden' name='amount' value='" . $row["amount"] . "'>";
                    echo "<td><button type='submit' $disabled>pay</button></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No results found";
            }

            // Close connection
            $conn->close();
        ?>
        
            
    <script>
        function Pay() {

        }
    </script>
</body>
</html>