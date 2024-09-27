<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance View</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        .attendance-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    transition: background-color 0.3s ease;
}

.light-mode {
    background-color: #f5f5f5;
    color: #000;
}

.dark-mode {
    background-color: #333;
    color: #fff;
}

.header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
}

.logo {
    font-size: 24px;
    font-weight: bold;
    color: #ffcc00;
}

.attendance-form {
    padding: 50px 20px;
    text-align: center;
}

.class-selection {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.form-select, .form-control {
    width: auto;
}

.attendance-table {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

.footer {
    width: 100%;
    text-align: center;
    padding: 10px 0;
}

.btn-light {
    background-color: #ffcc00;
    color: #000;
}
        </style>
</head>
<body class="attendance-container light-mode">
    <header class="header">
        <div class="logo">Smart Campus</div>
        <button class="btn btn-light" id="themeToggle">Switch to Dark Mode</button>
    </header>

    <section class="attendance-form">
        <h2>Student Attendance</h2>
        <div class="class-selection d-flex">
            <select id="departmentSelect" class="form-select me-2">
                <option value="">Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Electronics">Electronics</option>
                <option value="Mechanical">Mechanical</option>
            </select>

            <select id="yearSelect" class="form-select me-2">
                <option value="">Select Year</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
            </select>

            <input 
                type="text" 
                id="rollNoInput" 
                placeholder="Enter Roll No." 
                class="form-control me-2" 
            />

            <button class="btn btn-primary" id="fetchButton">Fetch</button>
        </div>

        <div class="attendance-table mt-4" id="attendanceTable" style="display: none;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="attendanceTableBody">
                </tbody>
            </table>
        </div>
    </section>

    <footer class="footer mt-4">
        <p>© 2024 Smart Campus. All Rights Reserved.</p>
    </footer>

    <script >
        document.addEventListener("DOMContentLoaded", function() {
    const departments = ["Computer Science", "Electronics", "Mechanical"];
    const years = ["1st Year", "2nd Year", "3rd Year"];
    const students = [
        { rollNo: "CS101", name: "John Doe", year: "1st Year", department: "Computer Science", attendanceRecord: { "2024-09-01": "P", "2024-09-02": "A", "2024-09-03": "P" } },
        { rollNo: "CS102", name: "Jane Smith", year: "1st Year", department: "Computer Science", attendanceRecord: { "2024-09-01": "P", "2024-09-02": "P", "2024-09-03": "A" } },
        { rollNo: "CS103", name: "Alice Johnson", year: "2nd Year", department: "Electronics", attendanceRecord: { "2024-09-01": "A", "2024-09-02": "P", "2024-09-03": "P" } },
        { rollNo: "CS104", name: "Bob Brown", year: "3rd Year", department: "Mechanical", attendanceRecord: { "2024-09-01": "P", "2024-09-02": "A", "2024-09-03": "A" } },
    ];

    const departmentSelect = document.getElementById("departmentSelect");
    const yearSelect = document.getElementById("yearSelect");
    const rollNoInput = document.getElementById("rollNoInput");
    const fetchButton = document.getElementById("fetchButton");
    const attendanceTable = document.getElementById("attendanceTable");
    const attendanceTableBody = document.getElementById("attendanceTableBody");
    const themeToggle = document.getElementById("themeToggle");
    let darkMode = false;

    departmentSelect.addEventListener("change", resetAttendance);
    yearSelect.addEventListener("change", resetAttendance);
    rollNoInput.addEventListener("input", resetAttendance);

    fetchButton.addEventListener("click", handleFetch);

    themeToggle.addEventListener("click", () => {
        darkMode = !darkMode;
        document.body.className = darkMode ? "attendance-container dark-mode" : "attendance-container light-mode";
        themeToggle.innerText = darkMode ? "Switch to Light Mode" : "Switch to Dark Mode";
    });

    function resetAttendance() {
        attendanceTable.style.display = "none";
        attendanceTableBody.innerHTML = "";
    }

    function handleFetch() {
        const selectedDepartment = departmentSelect.value;
        const selectedYear = yearSelect.value;
        const rollNo = rollNoInput.value;

        if (selectedDepartment && selectedYear && rollNo) {
            const student = students.find(s => s.department === selectedDepartment && s.year === selectedYear && s.rollNo === rollNo);
            if (student) {
                const attendanceRecord = student.attendanceRecord;
                attendanceTableBody.innerHTML = Object.entries(attendanceRecord).map(([date, status]) => `
                    <tr>
                        <td>${date}</td>
                        <td>${status === "P" ? "Present" : "Absent"}</td>
                    </tr>
                `).join('');
                attendanceTable.style.display = "table";
            } else {
                alert("Student not found!");
                resetAttendance();
            }
        } else {
            alert("Please select all fields and enter Roll No.");
        }
    }
});
    </script>
</body>
</html>