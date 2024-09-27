// Sample data
const students = [
    { rollNo: "CS101", name: "John Doe", attendanceRecord: { "2024-09-01": "P", "2024-09-02": "A", "2024-09-03": "P" } },
    { rollNo: "CS102", name: "Jane Smith", attendanceRecord: { "2024-09-01": "P", "2024-09-02": "P", "2024-09-03": "A" } },
    { rollNo: "CS103", name: "Alice Johnson", attendanceRecord: { "2024-09-01": "A", "2024-09-02": "P", "2024-09-03": "P" } },
    { rollNo: "CS104", name: "Bob Brown", attendanceRecord: { "2024-09-01": "P", "2024-09-02": "A", "2024-09-03": "A" } },
];

// Handle fetch button click
document.getElementById('fetchBtn').addEventListener('click', () => {
    const department = document.getElementById('departmentSelect').value;
    const year = document.getElementById('yearSelect').value;

    if (department && year) {
        const table = document.getElementById('attendanceTable');
        const tbody = document.getElementById('attendanceBody');
        tbody.innerHTML = ''; // Clear previous records

        students.forEach(student => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${student.rollNo}</td>
                <td>${student.name}</td>
                <td>${student.attendanceRecord["2024-09-01"] || '-'}</td>
                <td>${student.attendanceRecord["2024-09-02"] || '-'}</td>
                <td>${student.attendanceRecord["2024-09-03"] || '-'}</td>
            `;
            tbody.appendChild(row);
        });

        table.classList.remove('d-none');
    }
});

// Handle theme toggle
document.getElementById('themeToggle').addEventListener('click', () => {
    const body = document.body;
    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');

    const toggleBtn = document.getElementById('themeToggle');
    toggleBtn.textContent = body.classList.contains('dark-mode') ? 'Switch to Light Mode' : 'Switch to Dark Mode';
});
