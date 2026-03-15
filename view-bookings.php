<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "focal_db");

// Check if connection works
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Get all bookings
$sql = "SELECT * FROM bookings ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Focal Studios Admin</title>
    <style>
        body { background: #0a0a0a; color: white; font-family: sans-serif; padding: 50px; }
        h1 { color: #D4AF37; border-bottom: 2px solid #D4AF37; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #1a1a1a; }
        th, td { padding: 15px; border: 1px solid #333; text-align: left; }
        th { background: #D4AF37; color: black; }
        tr:hover { background: #222; }
    </style>
</head>
<body>
    <h1>Incoming Bookings</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Service</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['service']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="index.html" style="color: #D4AF37;">← Back to Website</a>
</body>
</html>