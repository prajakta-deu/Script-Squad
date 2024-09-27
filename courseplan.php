<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Lesson Plan Page</title>
    <style>
        
body {
margin: 0;
font-family: Arial, sans-serif;
}

.lesson-plan-container {
display: flex;
flex-direction: column;
align-items: center;
transition: background-color 0.3s, color 0.3s;
min-height: 100vh;
padding: 20px;
}

.light {
background-color: #ffffff;
color: #000000;
}

.dark {
background-color: #121212;
color: #ffffff;
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

.theme-toggle {
background-color: #ffcc00;
border: none;
border-radius: 50%;
width: 40px;
height: 40px;
cursor: pointer;
font-size: 18px;
display: flex;
align-items: center;
justify-content: center;
transition: background-color 0.3s;
}

.lesson-plan-form {
padding: 50px 20px;
text-align: center;
}

.dropdowns {
display: flex;
gap: 10px;
margin-bottom: 20px;
justify-content: center;
}

.form-select {
min-width: 150px;
height: 40px; /* Reduced height */
}

.lesson-plan-table {
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

.button-group {
margin-top: 10px; /* Space between buttons */
}

.footer {
width: 100%;
text-align: center;
padding: 10px 0;
}

.button {
margin-right: 10px; /* Space between buttons */
padding: 5px 10px;
background-color: #007bff;
color: white;
border: none;
border-radius: 5px;
cursor: pointer;
}

.button:hover {
background-color: #0056b3;
}

.save-button {
margin-left: 10px; /* Additional space for the Save button */
}
        </style>
</head>

<body>
    <div class="lesson-plan-container light">
        <header class="header">
            <div class="logo">Smart Campus</div>
            <button class="theme-toggle" id="themeToggle">☀️</button>
        </header>

        <section class="lesson-plan-form">
            <h2>Create Lesson Plan</h2>
            <div class="dropdowns">
                <select id="department" class="form-select">
                    <option value="">Select Department</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Mechanical">Mechanical</option>
                </select>

                <select id="year" class="form-select">
                    <option value="">Select Year</option>
                    <option value="FY">FY</option>
                    <option value="SY">SY</option>
                    <option value="TY">TY</option>
                    <option value="Final Year">Final Year</option>
                </select>

                <select id="subject" class="form-select">
                    <option value="">Select Subject</option>
                    <option value="Data Structures">Data Structures</option>
                    <option value="Operating Systems">Operating Systems</option>
                    <option value="Database Management">Database Management</option>
                    <option value="Web Development">Web Development</option>
                </select>

                <button class="button" id="generateBtn">Generate</button>
            </div>

            <div class="lesson-plan-table" id="lessonPlanTable" style="display: none;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Topic</th>
                            <th>Date</th>
                            <th>Division</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="lessonPlanBody">
                        <!-- Rows will be generated here -->
                    </tbody>
                </table>
                <div class="button-group">
                    <button class="button" id="addTopicBtn">Add Topic</button>
                    <button class="button save-button" id="saveBtn">Save Lesson Plan</button>
                </div>
            </div>
        </section>

        <footer class="footer">
            <p>© 2024 Smart Campus. All Rights Reserved.</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>

<script>
const lessonPlanTable = document.getElementById("lessonPlanTable");
const lessonPlanBody = document.getElementById("lessonPlanBody");
const generateBtn = document.getElementById("generateBtn");
const addTopicBtn = document.getElementById("addTopicBtn");
const saveBtn = document.getElementById("saveBtn");
const themeToggle = document.getElementById("themeToggle");

let lessonPlan = [];
let darkMode = false;

generateBtn.addEventListener("click", () => {
const department = document.getElementById("department").value;
const year = document.getElementById("year").value;
const subject = document.getElementById("subject").value;

if (department && year && subject) {
lessonPlan = [{ srNo: 1, topic: "", date: "", div: "", status: "" }];
renderLessonPlan();
lessonPlanTable.style.display = "block";
}
});

addTopicBtn.addEventListener("click", () => {
lessonPlan.push({ srNo: lessonPlan.length + 1, topic: "", date: "", div: "", status: "" });
renderLessonPlan();
});

saveBtn.addEventListener("click", () => {
console.log("Lesson Plan Saved:", lessonPlan);
});

themeToggle.addEventListener("click", () => {
darkMode = !darkMode;
document.querySelector('.lesson-plan-container').className = lesson-plan-container ${darkMode ? 'dark' : 'light'};
themeToggle.innerHTML = darkMode ? "☀️" : "🌙";
});

function renderLessonPlan() {
lessonPlanBody.innerHTML = "";
lessonPlan.forEach((lesson, index) => {
const row = document.createElement("tr");
row.innerHTML = `
<td>${lesson.srNo}</td>
<td><input type="text" value="${lesson.topic}" placeholder="Enter Topic" class="form-control"
        oninput="updateLesson(${index}, 'topic', this.value)" /></td>
<td><input type="date" value="${lesson.date}" class="form-control"
        oninput="updateLesson(${index}, 'date', this.value)" /></td>
<td><input type="text" value="${lesson.div}" placeholder="Enter Division" class="form-control"
        oninput="updateLesson(${index}, 'div', this.value)" /></td>
<td>
    <select class="form-select" oninput="updateLesson(${index}, 'status', this.value)">
        <option value="">Select Status</option>
        <option value="Completed">Completed</option>
        <option value="Pending">Pending</option>
    </select>
</td>
<td><button class="button" onclick="removeLesson(${index})">Remove</button></td>
`;
lessonPlanBody.appendChild(row);
});
}

function updateLesson(index, field, value) {
lessonPlan[index][field] = value;
lessonPlan[index].srNo = index + 1; // Update serial number
renderLessonPlan();
}

function removeLesson(index) {
lessonPlan.splice(index, 1);
lessonPlan.forEach((lesson, i) => lesson.srNo = i + 1); // Update srNo after removal
renderLessonPlan();
}
</script>
</html>

