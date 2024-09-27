

<?php
include "db_connect.php";

// Fetch teacher data
$sql = "SELECT * FROM teachers";
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

<h1>Teacher Profile</h1> 

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Institution</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Office Hours</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['designation']}</td>
                <td>{$row['department']}</td>
                <td>{$row['institution']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['office_hours']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>

</body>
</html>
