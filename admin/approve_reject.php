<?php
include '../includes/config.php';

if (isset($_POST['request_id']) && isset($_POST['action'])) {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    // Set status to 'approved' or 'rejected' based on action
    $status = ($action === 'approve') ? 'approved' : 'rejected';

    // Update the leave request status in the database
    $query = "UPDATE leave_requests SET status = '$status' WHERE request_id = '$request_id'";
    if (mysqli_query($conn, $query)) {
        header('Location: leaves.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
