<?php
// Database connection
$mysqli = new mysqli("localhost", "username", "password", "your_database_name");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch current time and calculate the target time (5 minutes from now)
$now = new DateTime();
$now->modify('+5 minutes');
$targetTime = $now->format('Y-m-d H:i:s');

// Fetch upcoming lectures within the next 5 minutes
$notifications = [];
$result = $mysqli->query("SELECT * FROM lectures WHERE lecture_time BETWEEN NOW() AND '$targetTime'");

while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .notification {
            background-color: #e8f4e5;
            padding: 10px;
            margin: 10px 0;
            border-left: 5px solid #4CAF50;
            border-radius: 5px;
        }
        audio {
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Upcoming Lectures Notification</h1>
    <div id="notificationArea">
        <?php if (empty($notifications)): ?>
            <div class="notification">
                No upcoming lectures in the next 5 minutes.
            </div>
        <?php else: ?>
            <?php foreach ($notifications as $notification): ?>
                <div class="notification">
                    <strong>Subject:</strong> <?php echo htmlspecialchars($notification['subject']); ?><br>
                    <strong>Teacher:</strong> <?php echo htmlspecialchars($notification['teacher']); ?><br>
                    <strong>Time:</strong> <?php echo date('Y-m-d H:i:s', strtotime($notification['lecture_time'])); ?><br>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <audio id="notificationSound" src="notification.mp3" preload="auto"></audio>
</div>

<script>
    // Function to play notification sound
    function playNotificationSound() {
        const sound = document.getElementById('notificationSound');
        sound.play();
    }

    // Function to fetch notifications
    async function fetchNotifications() {
        const response = await fetch('notifications.php'); // Assuming you have notifications.php set up as before
        const notifications = await response.json();
        const notificationArea = document.getElementById('notificationArea');

        // Clear previous notifications
        notificationArea.innerHTML = '';

        // Display each notification
        notifications.forEach(notification => {
            const notificationDiv = document.createElement('div');
            notificationDiv.className = 'notification';
            notificationDiv.innerHTML = `
                <strong>Subject:</strong> ${notification.subject}<br>
                <strong>Teacher:</strong> ${notification.teacher}<br>
                <strong>Time:</strong> ${new Date(notification.lecture_time).toLocaleString()}<br>
            `;
            notificationArea.appendChild(notificationDiv);

            // Play sound
            playNotificationSound();
        });
    }

    // Call fetchNotifications every minute
    setInterval(fetchNotifications, 60000);
    // Initial fetch
    fetchNotifications();
</script>

</body>
</html>