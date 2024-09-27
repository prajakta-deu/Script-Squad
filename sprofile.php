<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the form data
    $first_name = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
    $middle_name = isset($_POST['middle-name']) ? trim($_POST['middle-name']) : '';
    $last_name = isset($_POST['last-name']) ? trim($_POST['last-name']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
    $nationality = isset($_POST['nationality']) ? trim($_POST['nationality']) : '';
    $permanent_address = isset($_POST['permanent-address']) ? trim($_POST['permanent-address']) : '';
    $current_address = isset($_POST['current-address']) ? trim($_POST['current-address']) : '';
    $marital_status = isset($_POST['marital-status']) ? trim($_POST['marital-status']) : '';
    $blood_group = isset($_POST['blood-group']) ? trim($_POST['blood-group']) : '';

   // Handle file upload for profile picture
    $profile_picture = null;
    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] === UPLOAD_ERR_OK) {
        $profile_picture = file_get_contents($_FILES['profile-picture']['tmp_name']);
    }

    // Prepare and execute the SQL statement with prepared statements for security
    $stmt = $conn->prepare("INSERT INTO students (first_name, middle_name, last_name, gender, dob, email, mobile, nationality, permanent_address, current_address, profile_picture, marital_status, blood_group) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssssssbss", $first_name, $middle_name, $last_name, $gender, $dob, $email, $mobile, $nationality, $permanent_address, $current_address, $profile_picture, $marital_status, $blood_group);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo '<script>alert("Information submitted successfully");window.location.href = "login.php";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Component</title>
    <style>
        body {
            background-color: #121212;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            padding: 20px;
            background-color: #121212;
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-container {
            margin: 20px 0;
        }

        .page-title {
            text-align: center;
            color: #ffcc00;
            margin-bottom: 20px;
        }

        .label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #ffcc00;
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 2px solid #ffcc00;
            background-color: #000;
            color: #f5f5f5;
        }

        .submit-button {
            background-color: #ffcc00;
            color: #121212;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="page-title">Personal Information</h2>
            <form method="post" enctype="multipart/form-data">
                <label for="first-name" class="label">First Name</label>
                <input type="text" id="first-name" name="first-name" required class="input">

                <label for="middle-name" class="label">Middle Name</label>
                <input type="text" id="middle-name" name="middle-name" class="input">

                <label for="last-name" class="label">Last Name</label>
                <input type="text" id="last-name" name="last-name" required class="input">

                <label for="gender" class="label">Gender</label>
                <select id="gender" name="gender" required class="input">
                    <option value="" disabled selected>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="dob" class="label">Date of Birth</label>
                <input type="date" id="dob" name="dob" required class="input">

                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" required class="input">

                <label for="mobile" class="label">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" required class="input">

                <label for="nationality" class="label">Nationality</label>
                <input type="text" id="nationality" name="nationality" required class="input">

                <label for="permanent-address" class="label">Permanent Address</label>
                <textarea id="permanent-address" name="permanent-address" required class="input"></textarea>

                <label for="current-address" class="label">Current Address</label>
                <textarea id="current-address" name="current-address" required class="input"></textarea>

                <label for="profile-picture" class="label">Profile Picture</label>
                <input type="file" id="profile-picture" name="profile-picture" class="input" accept="image/*">

                <label for="marital-status" class="label">Marital Status</label>
                <select id="marital-status" name="marital-status" required class="input">
                    <option value="" disabled selected>Select</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>

                <label for="blood-group" class="label">Blood Group</label>
                <input type="text" id="blood-group" name="blood-group" required class="input">

                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
