<?php
include './includes/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];


$query = "SELECT date, status FROM attendance WHERE user_id = $user_id";
$result = $conn->query($query);

$attendance_data = [];
$total_days = 0;
$total_absents = 0;
$total_leaves = 0;

while ($row = $result->fetch_assoc()) {
    $attendance_data[] = $row;

    if ($row['status'] == 'Present') {
        $total_days++;
    } elseif ($row['status'] == 'Absent') {
        $total_absents++;
    } else {
        $total_leaves++;
    }
}


$format = isset($_GET['format']) ? $_GET['format'] : 'text';

if ($format == 'excel') {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="attendance_report.xls"');
    echo "Date\tStatus\n";

    foreach ($attendance_data as $attendance) {

        $formatted_date = date("Y-m-d", strtotime($attendance['date']));
        echo $formatted_date . "\t" . $attendance['status'] . "\n";
    }

    echo "\nTotal Days Attended: $total_days\n";
    echo "Total Absents: $total_absents\n";
    echo "Total Leaves: $total_leaves\n";
} elseif ($format == 'text') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment;filename="attendance_report.txt"');

    echo "Attendance Report\n";
    echo "-----------------\n";

    foreach ($attendance_data as $attendance) {
        echo "Date: " . $attendance['date'] . " - Status: " . $attendance['status'] . "\n";
    }

    echo "\nTotal Days Attended: $total_days\n";
    echo "Total Absents: $total_absents\n";
    echo "Total Leaves: $total_leaves\n";
}

$conn->close();
