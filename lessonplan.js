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
    document.querySelector('.lesson-plan-container').className = `lesson-plan-container ${darkMode ? 'dark' : 'light'}`;
    themeToggle.innerHTML = darkMode ? "☀️" : "🌙";
});

function renderLessonPlan() {
    lessonPlanBody.innerHTML = "";
    lessonPlan.forEach((lesson, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${lesson.srNo}</td>
            <td><input type="text" value="${lesson.topic}" placeholder="Enter Topic" class="form-control" oninput="updateLesson(${index}, 'topic', this.value)" /></td>
            <td><input type="date" value="${lesson.date}" class="form-control" oninput="updateLesson(${index}, 'date', this.value)" /></td>
            <td><input type="text" value="${lesson.div}" placeholder="Enter Division" class="form-control" oninput="updateLesson(${index}, 'div', this.value)" /></td>
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
