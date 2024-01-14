<?php
if(isset($_POST['submit']))
{
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
    
    // Get values of car attributes
    $Plate = $_POST['Plate_id'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $price = $_POST['price_per_hour'];
    
    // Perform SQL query
    $sql= "INSERT INTO `car` (`plate_id`, `model`, `year`, `color`, `status`, `price_per_hour`) VALUES ('$Plate', '$model', '$year', '$color', 'available', '$price')";
    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close connection
    $conn->close();
    header('Location:home.php');
                
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Register New Car
        </title>
        <link rel="stylesheet" href="../home_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../user/style.css">
    </head>
    <body>
        <div class="toppage">
            <h1> Register New Car </h1>
        </div>
        <div class="topnav">
            <a href="home.php">Home</a>
            <a class="active" href="register_car.php">Register New Car</a>
            <a href="fix.php">Fixing</a>
            <a href="pickup.php">Pickups</a>
            <a href="return.php">Returns</a>
            <a href="search.php">Advanced Search</a>
            <a href="reports.php">Basic Reports</a>
        </div>
        <div class="d-flex align-items-center justify-content-center login">
        <form action="register_car.php" onsubmit="empty()" method="POST" class="border border-dark py-3 rounded border-2 w-25 shadow-sm p-3 mb-5 bg-body rounded form2">
            <div class="d-flex align-items-center justify-content-center flex-column">
                <h2 class="text-primary">Enter The New Car Specifications</h2>
                <i class="fa-solid fa-user fa-2x text-primary"></i>
            </div>
            <div class="mb-1 mx-3">
                <label for="text" class="form-label fw-bold text-primary"><i class="fa-solid fa-envelope"></i> Plate ID</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="Plate_id" placeholder="Enter Car Plate ID" id="plate_id">
            </div>
            <div class="mb-1 mx-3">
                <label for="text" class="form-label fw-bold text-primary"><i class="fa-solid fa-lock"></i> Model</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="model" placeholder="Enter Car Model" id="model">
            </div>
            <div class="mb-1 mx-3">
                <label for="number" class="form-label fw-bold text-primary"><i class="fa-solid fa-lock"></i> Year</label>
                <input type="number" class="form-control shadow-sm bg-body rounded" name="year" placeholder="YYYY" id="year" min="1980" max="2025">
            </div>
            <div class="mb-1 mx-3">
                <label for="text" class="form-label fw-bold text-primary"><i class="fa-solid fa-lock"></i> Color</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="color" placeholder="Enter Car Color" id="color">
            </div>
            <div class="mb-1 mx-3">
                <label for="number" class="form-label fw-bold text-primary"><i class="fa-solid fa-lock"></i> Price/Hour</label>
                <input type="number" step="0.01" class="form-control shadow-sm mb-4 bg-body rounded" name="price_per_hour" placeholder="Enter Car Price/Hour" id="price_per_hour">
            </div>
            <button type="submit" name="submit" class="btn btn-primary mx-3 mb-4 px-3">Add Car</button>
        </form>
    </div>
    </body>
    <script>
    function empty(){
        var plate_id= document.getElementById("plate_id").value;
        var model= document.getElementById("model").value;
        var year= document.getElementById("year").value;
        var color= document.getElementById("color").value;
        var price_per_hour= document.getElementById("price_per_hour").value;
        if(plate_id == ""){
            alert("Plate ID is empty");
            return false;
        }
        if(model == ""){
            alert("Model is empty");
            return false;
        }
        if(year == ""){
            alert("Year is empty");
            return false;
        }
        if(color == ""){
            alert("Color is empty");
            return false;
        }
        if(price_per_hour == ""){
            alert("Price/Hour is empty");
            return false;
        }
    }
    </script>
</html>
