<?php
$servername = "localhost";  // Change to your server's name
$username = "root";         // Change to your MySQL username
$password = "";             // Change to your MySQL password
$dbname = "fortune100";     // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE mobile = '$mobile'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that mobile number";
    }
}

$conn->close();
?>
