<?php
include './includes/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
    exit();
}
// Assuming user ID is available from session or another source
$user_id = $_SESSION['user_id'];  // Replace with dynamic user ID

// Fetch attendance data
$query = "SELECT date, status FROM attendance WHERE user_id = $user_id";
$result = $conn->query($query);

$attendance_data = [];
while ($row = $result->fetch_assoc()) {
    $attendance_data[] = [
        'title' => $row['status'],
        'start' => $row['date'],
        'color' => ($row['status'] == 'Present' ? 'green' : ($row['status'] == 'Absent' ? 'red' : 'orange'))
    ];
}

header('Content-Type: application/json');
echo json_encode($attendance_data);

$conn->close();
