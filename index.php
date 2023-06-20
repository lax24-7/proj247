<!-- index.php -->

<?php
// Start or resume the session


// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the dashboard or home page
    header('Location: home.php');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .form-group {
            margin-bottom: 0px;
        }
        .button {
           
            color: 
           ;
            border: 
            border-radius: 4px;
            
        }

        .button:hover {
            background-color:;
            
        }
        a {
  text-decoration: none;
  background-color: #4CAF50;
  color:#fff;
  padding: 5px 10px;
  border:none;
  border-radius: 4px;
  cursor: pointer;
   padding: 9px 10px
}

a:hover {
  background-color: #45a049;
  color: #fff;
}
.heading{

}

    </style>
</head>
<body>
<?php
// Include the header
require_once 'login.php';
?>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- Add any other content as needed -->











<?php
// Include the footer
require_once 'footer.php';
?>

</body>
</html>
