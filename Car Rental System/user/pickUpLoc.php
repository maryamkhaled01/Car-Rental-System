<?php
    session_start();
    $carId = $_GET['car_id'];       //car_id from form
    $_SESSION['car_id']= $carId ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
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
        <h1>Choose your pickup location</h1>
    </div>

    <div class="topnav" style="width: 100%; padding: 0px;">
        <a href="home.php">Home</a>
        <a class="active" href="search.php">Reserve a car</a>
        <a href="reservations.php">My Reservations</a>
        <!-- <a href="user/signup.php">Sign Up</a> -->
    </div>
    
    <form action="Rent.php" method="POST"  style="margin-top: 20px;">
        <label for="City" style="color:white; font-size: 30px; ">Select pickup location:</label>
        <select id="loc_id" name="loc_id">
            <?php
                // Fetch locations from the database
                $carId = $_SESSION['car_id'];      
                echo "<p>".$carId."</p>";
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "car_rental_system";
            
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $locations = $conn->query("SELECT loc_id,city,district 
                FROM `pickup_locations` JOIN locations
                ON loc_id=pickup_loc
                WHERE car_id='$carId';
                ");

                if ($locations->num_rows > 0) {
                    while($row = $locations->fetch_assoc()) {
                        echo "<option value='" . $row["loc_id"] . "'>" . $row["district"] . ",".$row["city"]."</option>";
                    }
                }

                $conn->close();
                
            ?>
        </select>
        <input type="submit" value="reserve car">
    </form>

</body>
</html>

