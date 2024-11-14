<?php
include('../includes/config.php.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetching data from AJAX request
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Check if attendance already exists for the selected user and date
    $sql_check = "SELECT * FROM attendance WHERE user_id = ? AND date = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("is", $user_id, $date);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Attendance already marked for this date.']);
    } else {
        // If attendance does not exist, insert the new record
        $sql_insert = "INSERT INTO attendance (user_id, date, status) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iss", $user_id, $date, $status);

        if ($stmt_insert->execute()) {
            echo json_encode(['success' => true, 'message' => 'Attendance successfully marked.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to mark attendance.']);
        }
    }

    $stmt_check->close();
    $stmt_insert->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
