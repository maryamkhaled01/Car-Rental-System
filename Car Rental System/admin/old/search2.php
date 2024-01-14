<html>
    <head>
        <title>
            Search
        </title>
        <link rel="stylesheet" href="../home_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="toppage">
            <h1> Search </h1>
        </div>
        <div class="topnav">
            <a href="home.php">Home</a>
            <a href="register_car.php">Register New Car</a>
            <a href="fix.php">Fixing</a>
            <a href="pickup.php">Pickups</a>
            <a href="return.php">Returns</a>
            <a class="active" href="search.php">Search</a>
            <a href="reports.php">Reports</a>
        </div>

        <!-- Search with car information -->
        <form action="search.php" id="search-form" method="get" style="margin-top: 20px;">
                <h4>1. Search By Car Information</h4>
                <select id="search-type" name="search-type" onchange="toggleSearchInput()" required>
                    <option value="" disabled selected>Select Search Type</option>
                    <option value="model">model</option>
                    <option value="year">year</option>
                    <option value="color">color</option>
                    <option value="price_per_hour">price/hour</option>
                </select>
                <input type="text" id="search-input" name="search-input" placeholder="Enter your search...">
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
                    $sql = "SELECT * FROM (car as c left join reservation as r on c.car_id = r.car_id) natural join customer WHERE $searchType LIKE '%$searchInput%'"; 
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
                            <th>Reservation Date </th>
                            <th>Pickedup </th>
                            <th>Pickup Date </th>
                            <th>Pickup Location </th>
                            <th>Returned </th>
                            <th>Return Date </th>
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
                                <td>".$row["res_date"]."</td>
                                <td>".$row["picked_up"]." </td>
                                <td>".$row["pickup_date"]."</td>
                                <td>".$row["pickup_loc"]."</td>
                                <td>".$row["is_ret"]."</td>
                                <td>".$row["ret_date"]."</td>";
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
            <form action="search.php" id="search-form" method="get" style="margin-top: 20px;">
                <h4>1. Search By Customer Information </h4>
                <select id="search-type" name="search-type" onchange="toggleSearchInput()" required>
                    <option value="" disabled selected>Select Search Type</option>
                    <option value="last_name">last name</option>
                    <option value="first_name">first name</option>
                    <option value="sex">sex</option>
                    <option value="driving_license_no">lisence number</option>
                    <option value="email">email</option>
                    <option value="birth_date">birth date</option>
                    <option value="phone_no">phone number</option>
                </select>
                <input type="text" id="search-input" name="search-input" placeholder="Enter your search...">
                <button type="submit" name="submit" id="search-button" >Search</button>
            </form>

            <div id="search-results">
                <?php
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
                            <th>Reservation Date </th>
                            <th>Pickedup </th>
                            <th>Pickup Date </th>
                            <th>Pickup Location </th>
                            <th>Returned </th>
                            <th>Return Date </th>
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
                                <td>".$row["res_date"]."</td>
                                <td>".$row["picked_up"]." </td>
                                <td>".$row["pickup_date"]."</td>
                                <td>".$row["pickup_loc"]."</td>
                                <td>".$row["is_ret"]."</td>
                                <td>".$row["ret_date"]."</td>";
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
            function toggleSearchInput() {
                var searchInput = document.getElementById('search-input');
                var searchType = document.getElementById('search-type');

                searchInput.disabled = searchType.value === '';
            }
        </script>
    </body>

    
</html>