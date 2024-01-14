<!DOCTYPE html>
<html>
    <head>
        <title>
            Search
        </title>
        <link rel="stylesheet" href="../home_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
        
        body{
            font-family: Arial, sans-serif;
            background-image: url('../car.jpg');
            backdrop-filter: brightness(0.6);
            position: relative;
            background-repeat: no-repeat;
            text-align: center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .results {
            font-family: Arial, sans-serif;
            position: relative;
            text-align: center;
            color: white;
        }

        .button {
            padding: 5px;
            background-color: #1b32de;
            color: #fff;
            cursor: pointer;
            border:#1b32de;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .input_box {
            background-color: lightcyan;
            border-radius: 6px;
        }
        h4, h5, label{
            font-weight: bold;
        }
        </style>
    </head>
    <body>
        <div class="toppage">
            <h1> Search </h1>
        </div>
        <div class="topnav">
        <a href="home.php">Home</a>
            <a href="register_car.php">Register New Car</a>
            <a href="pickup.php">Pickups</a>
            <a href="return.php">Returns</a>
            <a class="active" href="search.php">Search</a>
            <a href="reports.php">Reports</a>
        </div>

        <!-- Search with car information -->
        <form action="search.php" id="search1-form" method="get" style="margin-top: 20px;">
                <h4>1. Search By Car Information</h4>
                <select id="search1-type" name="search1-type" onchange="toggleSearchInput1()" required>
                    <option value="" disabled selected>Select Search Type</option>
                    <option value="model">model</option>
                    <option value="year">year</option>
                    <option value="color">color</option>
                    <option value="price_per_hour">price/hour</option>
                </select>
                <input type="text" id="search1-input" name="search1-input" placeholder="Enter your search..." class="input_box" disabled>
                <button type="submit" name="submit1" id="search1-button" class="button">Search</button>
            </form>

            <div id="search1-results" class="results">
                <?php
                //session_start();
                if(isset($_GET['submit1'])){
                    //$cust_id=$_SESSION['cust_id'];
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
                    $searchType = $_GET['search1-type'];
                    $searchInput = $_GET['search1-input'];

                    // Perform SQL query
                    $sql = "SELECT * FROM car natural join reservation natural join customer WHERE $searchType LIKE '%$searchInput%';"; 
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
                            <th>Car PLate ID</th>
                            <th>Car Model </th>
                            <th>Car Year </th>
                            <th>Car Color </th>
                            <th>Price/Hour </th>
                            <th>Customer Last Name </th>
                            <th>Customer First Name </th>
                            <th>Customer Gender </th>
                            <th>Customer Driving License Number </th>
                            <th>Customer Email </th>
                            <th>Customer Birth Date </th>
                            <th>Customer Phone Number </th>
                            <th>Customer Credit Card </th>
                            <th>Reservation Date </th>
                            <th>Pickedup </th>
                            <th>Pickup Date </th>
                            <th>Pickup Location Id </th>
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
                                <td>".$row["last_name"]."</td>
                                <td>".$row["first_name"]."</td>
                                <td>".$row["sex"]."</td>
                                <td>".$row["driving_license_no"]."</td>
                                <td>".$row["email"]."</td>
                                <td>".$row["birth_date"]."</td>
                                <td>".$row["phone_no"]."</td>
                                <td>".$row["card_no"]."</td>
                                <td>".$row["res_date"]."</td>
                                <td>".$row["picked_up"]." </td>
                                <td>".$row["pickup_date"]."</td>
                                <td>".$row["pickup_loc"]."</td>
                                <td>".$row["is_ret"]."</td>
                                <td>".$row["ret_date"]."</td>\
                                <td>".$row["isPaid"]."</td>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found";
                    }

                    // Close connection
                    $conn->close();
                }
                ?>
            </div>
        
            <!-- Search with customer information -->
            <form action="search.php" id="search2-form" method="get" style="margin-top: 20px;" >
                <h4>2. Search By Customer Information </h4>
                <select id="search2-type" name="search2-type" onchange="toggleSearchInput2()" required>
                    <option value="" disabled selected>Select Search Type</option>
                    <option value="last_name">Last Name</option>
                    <option value="first_name">First Name</option>
                    <option value="sex">Gender</option>
                    <option value="driving_license_no">Driving License Number</option>
                    <option value="email">Email</option>
                    <option value="birth_date">Birth Date</option>
                    <option value="phone_no">Phone Number</option>
                    <option value="card_no">Credit Card Number</option>
                </select>
                <input type="text" id="search2-input" name="search2-input" placeholder="Enter your search..." class="input_box" disabled>
                <button type="submit" name="submit2" id="search2-button" class="button">Search</button>
            </form>

            <div id="search2-results" class="results">
                <?php
                if(isset($_GET['submit2'])){
                    //$cust_id=$_SESSION['cust_id'];
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
                    $searchType = $_GET['search2-type'];
                    $searchInput = $_GET['search2-input'];

                    // Perform SQL query
                    $sql = "SELECT * FROM  customer natural join reservation natural join car WHERE $searchType LIKE '%$searchInput%'"; 
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
                            <th>Car PLate ID</th>
                            <th>Car Model </th>
                            <th>Car Year </th>
                            <th>Car Color </th>
                            <th>Price/Hour </th>
                            <th>Customer Last Name </th>
                            <th>Customer First Name </th>
                            <th>Customer Gender </th>
                            <th>Customer Driving License Number </th>
                            <th>Customer Email </th>
                            <th>Customer Birth Date </th>
                            <th>Customer Phone Number </th>
                            <th>Customer Credit Card </th>
                            <th>Reservation Date </th>
                            <th>Pickedup </th>
                            <th>Pickup Date </th>
                            <th>Pickup Location Id </th>
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
                                <td>".$row["last_name"]."</td>
                                <td>".$row["first_name"]."</td>
                                <td>".$row["sex"]."</td>
                                <td>".$row["driving_license_no"]."</td>
                                <td>".$row["email"]."</td>
                                <td>".$row["birth_date"]."</td>
                                <td>".$row["phone_no"]."</td>
                                <td>".$row["card_no"]."</td>
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
                }
                ?>
            </div>

            <!-- Search with reservation day -->
            <form id="search3-form" class="form">
                <br/>
                <h4>3. Search By Reservation Day</h4>
                <label>Choose Reservation Day</label>
                <input type="date" id="res_date" name="res_date" placeholder="" class="input_box">
                <button type="submit" name="submit3" id="search3-button" class="button">Search</button>
            </form>

            <div id="search3-results" class="results">
                <?php
                if(isset($_GET['submit3'])){
                    //$cust_id=$_SESSION['cust_id'];
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
                    $resDate = $_GET['res_date'];

                    // Perform SQL query
                    $sql = "SELECT * FROM  reservation natural join car natural join customer WHERE res_date LIKE '%$resDate%'"; 
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
                            <th>Car PLate ID</th>
                            <th>Car Model </th>
                            <th>Car Year </th>
                            <th>Car Color </th>
                            <th>Price/Hour </th>
                            <th>Customer Last Name </th>
                            <th>Customer First Name </th>
                            <th>Customer Gender </th>
                            <th>Customer Driving License Number </th>
                            <th>Customer Email </th>
                            <th>Customer Birth Date </th>
                            <th>Customer Phone Number </th>
                            <th>Customer Credit Card </th>
                            <th>Reservation Date </th>
                            <th>Pickedup </th>
                            <th>Pickup Date </th>
                            <th>Pickup Location Id </th>
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
                                <td>".$row["last_name"]."</td>
                                <td>".$row["first_name"]."</td>
                                <td>".$row["sex"]."</td>
                                <td>".$row["driving_license_no"]."</td>
                                <td>".$row["email"]."</td>
                                <td>".$row["birth_date"]."</td>
                                <td>".$row["phone_no"]."</td>
                                <td>".$row["card_no"]."</td>
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
                }
                ?>
            </div>

        <script>
            function toggleSearchInput1() {
                var searchInput = document.getElementById('search1-input');
                var searchType = document.getElementById('search1-type');

                searchInput.disabled = searchType.value === '';
            }

            function toggleSearchInput2() {
            var searchInput = document.getElementById('search2-input');
            var searchType = document.getElementById('search2-type');

            searchInput.disabled = searchType.value === '';
            }
        </script>
    </body>

    
</html>