<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Edit Student</h2>

    <div class="form-container">
        <form method="POST">
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" value="<?php echo htmlspecialchars($studentName); ?>" required>
            </div>
            <div class="form-group">
                <label for="registrationNumber">Registration Number:</label>
                <input type="text" id="registrationNumber" name="registrationNumber" value="<?php echo htmlspecialchars($registrationNumber); ?>" required>
            </div>
            <div class="form-group">
                <label for="fingerprint">Fingerprint:</label>
                <input type="text" id="fingerprint" name="fingerprint" value="<?php echo htmlspecialchars($fingerprint); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Update Student</button>
            </div>
        </form>
    </div>
</body>
</html>
