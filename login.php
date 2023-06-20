<!-- login.php -->

<?php
session_start();
require_once 'database.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the dashboard or home page
    header('Location: dashboard.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform input validation
    $errors = array();

    if (empty($username)) {
        $errors[] = "Username is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (count($errors) === 0) {
        // Perform user authentication
        $query = "SELECT id FROM users WHERE username = ? AND password = ?";
        $stmt = $mysqli->prepare($query);
    
        if (!$stmt) {
            die("Error preparing statement: " . $mysqli->error);
        }
    
        $stmt->bind_param("ss", $username, $password);
    
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
    
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();
    
        if ($userId) {
            // Store the user ID in the session
            $_SESSION['user_id'] = $userId;
    
            // Redirect to the dashboard or home page
            header('Location: dashboard.php');
            exit;
        } else {
            $errors[] = "Invalid username or password";
        }
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Attendance Management System</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .signup-link {
            margin-top: 10px;
        }

        .signup-link a {
            color: #333;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordVisibilityToggle = document.getElementById("password-toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordVisibilityToggle.innerText = "Hide";
            } else {
                passwordInput.type = "password";
                passwordVisibilityToggle.innerText = "Show";
            }
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if (isset($errors) && count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="button" id="password-toggle" onclick="togglePasswordVisibility()">Show</button>
        </div>
        <div class="form-group">
            <button type="submit">Log In</button>
        </div>
    </form>

    <div class="signup-link">
        <p>Not registered? <a href="signup.php">Sign up</a></p>
    </div>
</div>

</body>
</html>
