function getReport1() {
    var startDate = document.getElementById('start_date1').value;
    var endDate = document.getElementById('end_date1').value;
    var reportResults = document.getElementById('report1-results');

    // Perform server-side search using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update search results with the response
                reportResults.innerHTML = xhr.responseText;
            } else {
                // Handle error
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.open("POST", "report1.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("end_date=" + encodeURIComponent(endDate) + "&start_date=" + encodeURIComponent(startDate));
}

function getReport2() {
    var startDate = document.getElementById('start_date2').value;
    var endDate = document.getElementById('end_date2').value;
    var carPlate = document.getElementById('car_plate').value;
    var reportResults = document.getElementById('report2-results');

    // Perform server-side search using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update search results with the response
                reportResults.innerHTML = xhr.responseText;
            } else {
                // Handle error
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.open("POST", "report2.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("end_date=" + encodeURIComponent(endDate) + "&start_date=" + encodeURIComponent(startDate) + "&car_plate=" + encodeURIComponent(carPlate));
}

function getReport3() {
    var reportResults = document.getElementById('report3-results');

    // Perform server-side search using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update search results with the response
                reportResults.innerHTML = xhr.responseText;
            } else {
                // Handle error
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.open("POST", "report3.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}

function getReport4() {
    var CustId = document.getElementById('customer_id').value;
    var reportResults = document.getElementById('report4-results');

    // Perform server-side search using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update search results with the response
                reportResults.innerHTML = xhr.responseText;
            } else {
                // Handle error
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.open("POST", "report4.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("customer_id=" + encodeURIComponent(CustId));
}

function getReport5() {
    var startDate = document.getElementById('start_date5').value;
    var endDate = document.getElementById('end_date5').value;
    var reportResults = document.getElementById('report5-results');

    // Perform server-side search using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update search results with the response
                reportResults.innerHTML = xhr.responseText;
            } else {
                // Handle error
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.open("POST", "report5.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("end_date=" + encodeURIComponent(endDate) + "&start_date=" + encodeURIComponent(startDate));
}