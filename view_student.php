<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        .edit-btn, .delete-btn {
  display: inline-block;
  padding: 6px 12px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  margin-right: 5px;
}

.edit-btn:hover, .delete-btn:hover {
  background-color: green;
}

.delete-btn {
  background-color: red;
}

.delete-btn:hover {
  background-color: red;
}

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:black;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color:gray;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: white;
        }

        th {
            background-color: darkgray;
            color: black;
            font-weight: bold;
        }

        .add-button {
            margin-bottom: 20px;
        }

        .add-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .add-button a:hover {
            background-color: #0069d9;

        }
          
    </style>
</head>
<body>
    <h2>View Students</h2>

    <div class="add-button">
        <a href="add_student.php">Add Student</a>
    </div>

    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Registration Number</th>
            <th>Action</th>
        </tr>
        <!-- PHP code to fetch and display student records -->
<?php
    // Include the database connection file
    include 'config.php';

    // Fetch student records from the database
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    // Check if any records exist
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row of the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $studentId = $row['id'];
            $studentName = $row['student_name'];
            $registrationNumber = $row['registration_number'];

            // Output the student information in a table row
           // Output the student information in a table row
echo "<tr>";
echo "<td>$studentId</td>";
echo "<td>$studentName</td>";
echo "<td>$registrationNumber</td>";
echo "<td>
    <a href='edit_student.php?id=$studentId' class='btn-edit'>Edit</a>
    <a href='delete_student.php?id=$studentId' class='btn-delete'>Delete</a>
</td>";
echo "</tr>";

        }
    } else {
        // If no records exist, display a message
        echo "<tr><td colspan='4'>No students found.</td></tr>";
    }

    // Close the database connection
    mysqli_close($conn);
?>

    </table>
</body>
</html>

