<?php
include './includes/config.php';

header('Content-Type: application/json');

$query = "SELECT leave_date FROM leave_requests WHERE status = 'Approved'";
$result = mysqli_query($conn, $query);

$leaveEvents = [];

while ($row = mysqli_fetch_assoc($result)) {
    $leaveEvents[] = [
        'title' => 'Leave',
        'start' => $row['leave_date'],
        'allDay' => true,
        'backgroundColor' => '#ffc107',
        'borderColor' => '#ffc107'
    ];
}

echo json_encode($leaveEvents);
