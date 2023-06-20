<?php
    // Database configuration constants
    define('DB_HOST', 'localhost'); // Database host
    define('DB_USERNAME', 'root'); // Database username
    define('DB_PASSWORD', ''); // Database password
    define('DB_NAME', 'attendance_db'); // Database name

    // Create a database connection
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
