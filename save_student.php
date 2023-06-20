<?php
// Check if the required form fields are submitted
if (isset($_POST['studentName'], $_POST['registrationNumber'], $_POST['isoTemplate'], $_POST['textareaData'])) {
    // Retrieve the form data
    $studentName = $_POST['studentName'];
    $registrationNumber = $_POST['registrationNumber'];
    $isoTemplate = $_POST['isoTemplate'];
    $textareaData = $_POST['textareaData'];

    // Perform any necessary data validation or sanitization here

    // Create a PDO connection to the database
    $dbHost = "localhost";
    $dbName = "attendance_db";
    $dbUser = "root";
    $dbPass = "";

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO students (student_name, registration_number, fingerprint_template, textarea_data) VALUES (:studentName, :registrationNumber, :fingerprintTemplate, :textareaData)";
        $stmt = $pdo->prepare($sql);

        // Bind the parameter values
        $stmt->bindParam(':studentName', $studentName);
        $stmt->bindParam(':registrationNumber', $registrationNumber);
        $stmt->bindParam(':fingerprintTemplate', $isoTemplate);
        $stmt->bindParam(':textareaData', $textareaData);

        // Execute the SQL statement
        $stmt->execute();

        // Output success message or perform any additional actions
        echo "<script>alert('Student record saved successfully.'); window.location.href = 'add_student.php';</script>";
        exit;

    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }

} else {
    // Handle case where required form fields are not submitted
    echo "Required form fields are missing.";
}
?>
