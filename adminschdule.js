let timetable = null;
let isEditable = false;

function generateTimetable() {
    const department = document.getElementById("department").value;
    const classSelection = document.getElementById("classSelection").value;
    const division = document.getElementById("division").value;

    if (department && classSelection && division) {
        timetable = Array.from({ length: 6 }, () =>
            Array.from({ length: 6 }, () => "")
        );

        const timetableBody = document.getElementById("timetableBody");
        timetableBody.innerHTML = ""; // Clear previous content

        const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        days.forEach((day, rowIndex) => {
            const row = document.createElement("tr");
            const dayCell = document.createElement("td");
            dayCell.innerText = day;
            row.appendChild(dayCell);

            timetable[rowIndex].forEach((period, colIndex) => {
                const cell = document.createElement("td");
                const input = document.createElement("input");
                input.type = "text";
                input.placeholder = `Lecture ${colIndex + 1}`;
                input.className = "form-control";
                input.disabled = !isEditable;

                input.addEventListener('input', (e) => {
                    timetable[rowIndex][colIndex] = e.target.value;
                });

                cell.appendChild(input);
                row.appendChild(cell);
            });

            timetableBody.appendChild(row);
        });

        document.getElementById("timetable").style.display = "block"; // Show timetable
        isEditable = false; // Reset edit mode when generating a new timetable
    }
}

function editTimetable() {
    isEditable = true;
    const inputs = document.querySelectorAll(".form-control");
    inputs.forEach(input => input.disabled = !isEditable);
}

function saveTimetable() {
    alert("Timetable Saved!");
    isEditable = false;
    const inputs = document.querySelectorAll(".form-control");
    inputs.forEach(input => input.disabled = !isEditable);
}
