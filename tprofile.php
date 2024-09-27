<?php 
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full-name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $institution = $_POST['institution'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $office_hours = $_POST['office-hours'];

    // Handle file upload for profile picture
    $profile_picture = null;
    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] === UPLOAD_ERR_OK) {
        $profile_picture = file_get_contents($_FILES['profile-picture']['tmp_name']);
    }

    // Escape the variables for safe SQL insertion
    $full_name = $conn->real_escape_string($full_name);
    $profile_picture = $conn->real_escape_string($profile_picture);
    $designation = $conn->real_escape_string($designation);
    $department = $conn->real_escape_string($department);
    $institution = $conn->real_escape_string($institution);
    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);
    $office_hours = $conn->real_escape_string($office_hours);

    // Prepare and execute the SQL statement without prepared statements
    $sql = "INSERT INTO teachers (full_name, profile_picture, designation, department, institution, email, phone, office_hours) VALUES ('$full_name', '$profile_picture', '$designation', '$department', '$institution', '$email', '$phone', '$office_hours')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Teacher information submitted successfully");window.location.href = "login.php";</script>';
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            padding: 20px;
            background-color: #121212;
            border-radius: 8px;
        }

        .tab-content {
            padding: 20px;
            background-color: #1f1f1f;
            border-radius: 8px;
        }

        .form-container {
            margin: 0 auto;
            width: 56%;
            max-width: 600px;
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
        <div class="tab-content">
            <div class="form-container" id="basic-info">
                <h2 class="page-title">Teachers Profile</h2>
                <form method="post" enctype="multipart/form-data">
                    <label for="full-name" class="label">Full Name</label>
                    <input type="text" id="full-name" name="full-name" required class="input" />

                    <label for="profile-picture" class="label">Profile Picture</label>
                    <input type="file" id="profile-picture" name="profile-picture" class="input" required />

                    <label for="designation" class="label">Designation</label>
                    <input type="text" id="designation" name="designation" required class="input" />

                    <label for="department" class="label">Department</label>
                    <input type="text" id="department" name="department" required class="input" />

                    <label for="institution" class="label">Institution/School Name</label>
                    <input type="text" id="institution" name="institution" required class="input" />

                    <label for="email" class="label">Email Address</label>
                    <input type="email" id="email" name="email" required class="input" />

                    <label for="phone" class="label">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="input" required />

                    <label for="office-hours" class="label">Office Hours</label>
                    <input type="text" id="office-hours" name="office-hours" class="input" required />

                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>

            <!-- You can add more sections for Professional Details, Achievements, etc. as needed -->
        </div>
    </div>
</body>

</html>
