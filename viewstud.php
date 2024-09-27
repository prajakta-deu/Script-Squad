<?php
include "db_connect.php";

// Fetch teacher data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
        body {
            display: flex;
            flex-direction: column; /* Stack children vertically */
            justify-content: center; 
            align-items: center;    
            height: 100vh;          
            margin: 0;              
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center; /* Center the heading text */
            margin-bottom: 20px; /* Space between heading and table */
            font-size: 24px; /* Heading font size */
            color: #333; /* Heading text color */
        }

        table {
            border-collapse: collapse; 
            width: 80%;               
            margin: 0 auto;           
        }

        th, td {
            padding: 10px;            
            text-align: left;         
            border: 1px solid #ddd;   
        }

        th {
            background-color: #ffcc00; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
    </style>
</head>

<body>

<h1>Student Profile</h1> 

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Nationality</th>
                <th>Permanent Address</th>
                <th>Current Address</th>
                <th>Marital Status</th>
                <th>Blood Group</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['middle_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['email']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['nationality']}</td>
                <td>{$row['permanent_address']}</td>
                <td>{$row['current_address']}</td>
                <td>{$row['marital_status']}</td>
                <td>{$row['blood_group']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>

</body>
</html>
