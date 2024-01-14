
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
            <h1>Search For your car</h1>
        </div>

        <div class="topnav" style="width: 100%; padding: 0px;">
            <a href="home.php">Home</a>
            <a class="active" href="search.php">Reserve a car</a>
            <a href="reservations.php">My Reservations</a>
            <!-- <a href="user/signup.php">Sign Up</a> -->
        </div>
        
            <form action="search.php" id="search-form" method="get" style="margin-top: 20px;">
                <select id="search-type" name="search-type" onchange="toggleSearchInput()" required>
                    <option value="" disabled selected>Select Search Type</option>
                    <option value="model">model</option>
                    <option value="year">year</option>
                    <option value="color">color</option>
                    <option value="price_per_hour">price/hour</option>
                </select>
                <input type="text" id="search-input" name="search-input" placeholder="Enter your search..." disabled>
                <button type="submit" name="submit" id="search-button" >Search</button>
            </form>
            <div id="search-results">
                <?php
                session_start();
                if(isset($_GET['submit'])){
                    $cust_id=$_SESSION['cust_id'];
                    // echo $cust_id;

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
                    $searchType = $_GET['search-type'];
                    $searchInput = $_GET['search-input'];

                    // Perform SQL query
                    $sql = "SELECT * FROM car WHERE $searchType LIKE '%$searchInput%'"; 
                    $result = $conn->query($sql);

                    // Display search results
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $disabled = ($row["status"]=='available') ? '' : 'disabled';
                            echo "<div style='background-color: aliceblue; padding: 10px;'>";
                            echo "<form action='pickUpLoc.php' method='get'>";
                            echo "<p>plate Number: ".$row["plate_id"]." <br/> model: ".$row["model"]." <br/> year: ".$row["year"]." <br/> color: ".$row["color"]." <br/> status: ".$row["status"]." <br/> price/hour: ".$row["price_per_hour"]."</p>";
                            echo "<input type='hidden' name='car_id' value='" . $row["car_id"] . "'>";
                            echo "<button type='submit' $disabled>Rent</button>";
                            echo "</form>";
                            echo "</div>";
                        }
                    } else {
                        echo "No results found";
                    }

                    // Close connection
                    $conn->close();
                }
                ?>
            </div>


    <script>
        function toggleSearchInput() {
            var searchInput = document.getElementById('search-input');
            var searchType = document.getElementById('search-type');

            searchInput.disabled = searchType.value === '';
        }
    </script>
</body>
</html>

