<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <script src="reports.js"></script>
    <link rel="stylesheet" href="../home_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
    <style>
        .form{
            font-family: Arial, sans-serif;
            background-image: url('../car.jpg');
            backdrop-filter: brightness(0.7);
            position: relative;
            background-repeat: no-repeat;
            text-align: center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .form::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../car.jpg'); /* Use the same image as the background */
            background-repeat: no-repeat;
            background-size: cover;
            filter: brightness(0.4); /* Adjust the value (0.0 to 1.0) to decrease intensity */
            z-index: -1;
            pointer-events: none;
        }

        .reports {
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
        <h1> Reports</h1>
    </div>
    <div class="topnav">
    <a href="home.php">Home</a>
        <a href="register_car.php">Register New Car</a>
        <a href="pickup.php">Pickups</a>
        <a href="return.php">Returns</a>
        <a href="search.php">Search</a>
        <a class="active" href="reports.php">Reports</a>
    </div>

    <form id="reports-form" class="form">
        <br/>
        <br/>
        <h4>1. Report All Reservations Within a Specified Period</h4>
        <h5>Specify The Period</h5>
        <label>From</label>
        <input type="date" id="start_date1" name="start" placeholder="" class="input_box">
        <label>To</label>
        <input type="date" id="end_date1" name="end" placeholder="" class="input_box">
        <button type="button" id="report1-button" class="button" onclick="getReport1()">Display</button>

        <div id="report1-results" class="reports"></div>

        <br/>
        <br/>
        <h4 >2. Report All Reservations of a Car Within a Specified Period</h4>
        <h5>Specify The Period</h5>
        <label>From</label>
        <input type="date" id="start_date2" name="start" placeholder="" class="input_box">
        <label>To</label>
        <input type="date" id="end_date2" name="end" placeholder="" class="input_box">
        <h5><br/>Enter The Car Plate Id</h5>
        <input type="text" id="car_plate" name="car" placeholder="Enter The Car Plate Id" class="input_box">
        <button type="button" id="report2-button" class="button" onclick="getReport2()">Display</button>

        <div id="report2-results" class="reports"></div>

        <br/>
        <br/>
        <h4>3. Report The Status of All Cars</h4>
        <button type="button" id="report3-button" class="button" onclick="getReport3()">Display</button>

        <div id="report3-results" class="reports"></div>

        <br/>
        <br/>
        <h4>4. Report All Reservations of a Specific Customer</h4>
        <h5>Enter the Customer Id</h5>
        <input type="number" id="customer_id" name="customer" placeholder="Enter the Customer Id" class="input_box">
        <button type="button" id="report4-button" class="button" onclick="getReport4()">Display</button>

        <div id="report4-results" class="reports"></div>

        <br/>
        <br/>
        <h4>5. Report Daily Payments Within a Specific Period</h4>
        <h5>Specify The Period</h5>
        <label>From</label>
        <input type="date" id="start_date5" name="start" placeholder="" class="input_box">
        <label>To</label>
        <input type="date" id="end_date5" name="end" placeholder="" class="input_box">
        <button type="button" id="report5-button" class="button" onclick="getReport5()">Display</button>

        <div id="report5-results" class="reports"></div>
        <br/>
        <br/>

    </form>
</body>

</html>
