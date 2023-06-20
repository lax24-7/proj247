<?php
// Database connection setup
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'attendance_db';

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Retrieve the input data from the textarea
    $isoTemplate = $_POST['textareaData'];

    // Ensure the connection variable is properly initialized and assigned
    if ($conn) {
        // Escape the input data to prevent SQL injection
        $escapedTemplate = mysqli_real_escape_string($conn, $isoTemplate);

        // Query the database to check if the template exists
        $query = "SELECT * FROM students WHERE textarea_data = '$escapedTemplate'";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result) {
            // Check if a matching record was found
            if (mysqli_num_rows($result) > 0) {
                echo "Template exists in the database.";
            } else {
                echo "Template does not exist in the database.";
            }
        } else {
            echo "Query failed: " . mysqli_error($conn);
        }
    } else {
        echo "Connection error: Unable to connect to the database.";
    }
}
?>
