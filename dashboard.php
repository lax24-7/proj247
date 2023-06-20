<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
         h2 {
            color: #fff;
            background-color: #888;
          
        }
        body {
            background-color:black;
           
        }

        /* Rest of the styles... */

        .content {
            margin-left: 250px;
            padding: 20px;
            text-align: center;
        }

        .statistics {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .statistics-item {
            flex: 1;
            padding: 10px;
        }

        .statistics-item h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        /* Sidebar styles */
        .sidebar {
            width: 220px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            color: #fff;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.sidebar-collapsed {
            width: 60px;
        }

        .sidebar h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .sidebar .menu-item {
            margin-bottom: 10px;
        }

        .sidebar .menu-item a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .sidebar .menu-item a:hover {
            background-color: #555;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
        }

        .dropdown .dropdown-btn {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .dropdown .dropdown-btn:hover {
            background-color: #555;
        }

        .dropdown .dropdown-content {
            display: none;
            position: absolute;
            background-color: #555;
            min-width: 200px;
            padding: 10px;
            z-index: 1;
        }

        .dropdown .dropdown-content a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 5px;
            transition: all 0.3s ease;
        }

        .dropdown .dropdown-content a:hover {
            background-color: #777;
        }

        .dropdown .show {
            display: block;
        }

        /* Content styles */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Logout button */
        .logout-btn {
            margin-top: 20px;
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #c0392b;
            border-radius: 5px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #e74c3c;
        }
        .data-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            color: white;
            margin-left:150px;
        }

        .data-container .data-box {
            padding: 10px;
            background-color: #444;
            text-align: center;
        }
    </style>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("sidebar-collapsed");
        }

        function toggleDropdown(event) {
            event.preventDefault();
            var dropdownContent = event.target.nextElementSibling;
            dropdownContent.classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-btn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var dropdown = dropdowns[i];
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            }
        };
    </script>
</head>
<body>
    <div id="sidebar" class="sidebar">
        <h1>Attendance System</h1>
        <div class="menu-item">
            <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="dropdown">
        <a href="#" class="dropdown-btn" onclick="toggleDropdown(event)">Manage Student</a>
            <div class="dropdown-content">
                <a href="add_student.php">Add Student</a>
                <a href="view_student.php">View Student</a>
            </div>
        </div>
        <div class="dropdown">
        <a href="#" class="dropdown-btn" onclick="toggleDropdown(event)">Manage Class</a>
            <div class="dropdown-content">
                <a href="add_class.php">Add Class</a>
                <a href="view_class.php">View Class</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropdown-btn" onclick="toggleDropdown(event)">Manage Attendance</a>
            <div class="dropdown-content">
                <a href="take_attendance.php">Take Attendance</a>
                <a href="view_attendance.php">View Attendance</a>
            </div>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

     <div class="content">
        <!-- Your page content goes here -->
        <h2>Welcome to the Dashboard</h2>
    </div>
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

        // Query to retrieve the data
        $studentCountQuery = "SELECT COUNT(*) AS studentCount FROM students";
        $classCountQuery = "SELECT COUNT(*) AS classCount FROM class";
        $attendanceCountQuery = "SELECT COUNT(*) AS attendanceCount FROM attendance";

        $studentResult = mysqli_query($conn, $studentCountQuery);
        $classResult = mysqli_query($conn, $classCountQuery);
        $attendanceResult = mysqli_query($conn, $attendanceCountQuery);

        // Check query results
        if (mysqli_num_rows($studentResult) > 0 && mysqli_num_rows($classResult) > 0 && mysqli_num_rows($attendanceResult) > 0) {
            $studentCount = mysqli_fetch_assoc($studentResult)['studentCount'];
            $classCount = mysqli_fetch_assoc($classResult)['classCount'];
            $attendanceCount = mysqli_fetch_assoc($attendanceResult)['attendanceCount'];

            // Display the data
            echo '<div class="data-container">';
            echo '<div class="data-box">';
            echo '<h4>Number of Students</h4>';
            echo '<p>' . $studentCount . '</p>';
            echo '</div>';

            echo '<div class="data-box">';
            echo '<h4>Number of Classes</h4>';
            echo '<p>' . $classCount . '</p>';
            echo '</div>';

            echo '<div class="data-box">';
            echo '<h4>Attendance Statistics</h4>';
            echo '<p>Total Attendance: ' . $attendanceCount . '</p>';
            // You can display more statistics here as needed
            echo '</div>';
            echo '</div>';
        } else {
            echo 'No data available.';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
