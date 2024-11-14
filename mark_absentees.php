<?php
include './includes/config.php';

$date = date('Y-m-d', strtotime('-1 day'));

$query = "SELECT user_id FROM users WHERE user_id NOT IN (
            SELECT user_id FROM attendance WHERE date = '$date' AND status = 'Present'
          ) AND user_id NOT IN (
            SELECT user_id FROM leave_requests WHERE leave_date = '$date' AND status = 'approve'
          )";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $userId = $row['user_id'];

    $insertQuery = "INSERT INTO attendance (user_id, date, status) 
                    VALUES ('$userId', '$date', 'Absent') 
                    ON DUPLICATE KEY UPDATE status = 'Absent'";
    $conn->query($insertQuery);
}

$conn->close();
