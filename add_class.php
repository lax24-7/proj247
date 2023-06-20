<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $class_name = $_POST['class_name'];
    $class_code = $_POST['class_code'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance_db";

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO class (class_name, class_code) VALUES (:class_name, :class_code)");

    // Bind the parameters
    $stmt->bindParam(':class_name', $class_name);
    $stmt->bindParam(':class_code', $class_code);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Handle the error if the query fails
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
   <style>
        /* Your CSS styles here */
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group .error {
            color: red;
        }

        .form-group .btn-submit {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
<body>
    <div class="container">
        <h1>Add Class</h1>
        <form method="POST" action="add_class.php">
            <div class="form-group">
                <label for="class_name">Class Name</label>
                <input type="text" name="class_name" id="class_name" required>
            </div>
            <div class="form-group">
                <label for="class_code">Class Code</label>
                <input type="text" name="class_code" id="class_code" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Add Class</button>
            </div>
        </form>
    </div>
</body>
</html>
