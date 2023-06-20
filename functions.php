<?php
// Function to establish database connection
function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance_db";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Function to add a new student
function addStudent($studentName, $registrationNumber)
{
    $conn = connectDB();

    try {
        $stmt = $conn->prepare("INSERT INTO student (student_name, registration_number) VALUES (?, ?)");
        $stmt->execute([$studentName, $registrationNumber]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to get all students
function getAllStudents()
{
    $conn = connectDB();

    try {
        $stmt = $conn->query("SELECT * FROM student");
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    } catch (PDOException $e) {
        return [];
    }
}

// Function to get a student by ID
function getStudentById($studentId)
{
    $conn = connectDB();

    try {
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
        $stmt->execute([$studentId]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        return $student;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to update a student
function updateStudent($studentId, $studentName, $registrationNumber)
{
    $conn = connectDB();

    try {
        $stmt = $conn->prepare("UPDATE student SET student_name = ?, registration_number = ? WHERE id = ?");
        $stmt->execute([$studentName, $registrationNumber, $studentId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to delete a student
function deleteStudent($studentId)
{
    $conn = connectDB();

    try {
        $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
        $stmt->execute([$studentId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
?>
