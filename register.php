<?php
include "pakage.html"; // Ensure this file exists and is included properly
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $mname = $_POST["mname"]; // Corrected field name from "mame" to "mname"
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id = $_POST["Id"]; // Corrected field name to match the input name
    $mob_no = $_POST["mob_no"];
    $gender = $_POST["gender"];
    $role = $_POST["role"];

    $existSql = "SELECT * FROM `register` WHERE email = '$email'";
    $numExistRows = mysqli_num_rows(mysqli_query($conn, $existSql));
    if ($numExistRows > 0) {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'Username Already Exists! Please Try Again...',
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                }).then(function() {
                    window.location.href = 'register.php';
                });
              </script>";
    } else {
        $sql = "INSERT INTO `register`(`fname`, `mname`, `lname`, `email`, `password`, `id`, `mob_no`, `gender`, `role`) VALUES ('$fname', '$mname', '$lname', '$email', '$password', '$id', '$mob_no', '$gender', '$role')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>
                    Swal.fire({
                        title: 'Success',
                        text: 'Registration successful! Please Login',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'login.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Registration Failed! Please try again...',
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    }).then(function() {
                        window.location.href = 'register.php';
                    });
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> <!-- Include SweetAlert -->
    <style>
        /* Add your existing CSS styles here */
        .RContainer {
            height: 150vh;
            width: 100vw;
            background-color: #1845ad;
            position: relative; /* Added for proper positioning of child elements */
        }
        .background {
            width: 500px;
            height: auto;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child {
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }
        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }
        form {
            width: 500px;
            background-color: rgba(255, 255, 255, 0.13);
            position: relative; /* Changed to relative for better alignment */
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }
        form * {
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            font-weight: 500;
        }
        input, select {
            height: 45px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 5px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }
        button {
            margin-top: 30px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="RContainer">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <form method="POST"> <!-- Added method attribute -->
            <h3>Register Here</h3>

            <div class="form-grid">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" placeholder="First Name" id="fname" name="fname" required />
                </div>

                <div class="form-group">
                    <label for="mname">Middle Name:</label> <!-- Corrected for mname -->
                    <input type="text" placeholder="Middle Name" id="mname" name="mname" required />
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" placeholder="Last Name" id="lname" name="lname" required />
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" placeholder="Email" id="email" name="email" required />
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" placeholder="Password" id="password" name="password" required />
                </div>

                <div class="form-group">
                    <label for="Id">College ID:</label> <!-- Corrected for Id -->
                    <input type="text" placeholder="College ID" id="Id" name="Id" required />
                </div>

                <div class="form-group">
                    <label for="mob_no">Mobile No:</label>
                    <input type="tel" placeholder="Mobile No" id="mob_no" name="mob_no" required />
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</div>

<!-- Include SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>
