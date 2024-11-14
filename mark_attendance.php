<?php
include './includes/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$date = $_POST['date'] ?? null;

if (!$date) {
    echo json_encode(['success' => false, 'message' => 'Date is required']);
    exit;
}

// Check if the date is a leave day
$leaveQuery = "SELECT * FROM leave_requests WHERE user_id = $user_id AND leave_date = '$date' AND status = 'approve'";
$leaveResult = $conn->query($leaveQuery);

if ($leaveResult->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'You are on leave for this date. Attendance cannot be marked.']);
    exit;
}

// Check if attendance is already marked for today
$query = "SELECT * FROM attendance WHERE user_id = $user_id AND date = '$date'";
$result = $conn->query($query);

if ($result->num_rows === 0) {
    // Insert today's attendance as "Present"
    $insert_query = "INSERT INTO attendance (user_id, date, status) VALUES ($user_id, '$date', 'Present')";
    if ($conn->query($insert_query)) {
        echo json_encode(['success' => true, 'message' => 'Attendance marked successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to mark attendance']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Attendance already marked for today']);
}

$conn->close();
