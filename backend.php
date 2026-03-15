<?php
// 1. Database Configuration
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "focal_db";

// 2. Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Check Connection (Debug Mode)
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// 4. Process Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and clean data from the HTML form
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $service = $conn->real_escape_string($_POST['service']);
    $message = $conn->real_escape_string($_POST['message']);

    // 5. Insert into Database
    $sql = "INSERT INTO bookings (name, email, service, message) 
            VALUES ('$name', '$email', '$service', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Booking Received Successfully!');
                window.location.href='index.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>