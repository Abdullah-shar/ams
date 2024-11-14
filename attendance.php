    <?php
    include './includes/config.php';

    session_start();

    if (!isset($_SESSION['user_id'])) {

        header('Location: index.php');
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Dashboard</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <link rel="stylesheet" href="./assets/css/style.css">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion bg-dark" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon">
                        <img src="./assets/images/AMS.png" alt="Logo" width="150" height="100" class="d-inline-block align-text-top">
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="attendance.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Attendance</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="leave_req.php">
                        <i class="bi bi-send"></i>
                        <span>Leave</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block bg-light">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow bg-white">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw fa-lg text-dark"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">November 08, 2024</div>
                                            <span class="font-weight-bold">Your monthly attendance report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw fa-lg text-dark"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">1</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>


                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="./assets/images/avatar.png" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">You're a great Student! Your Attendance is greater than 80%..</div>
                                            <div class="small text-gray-500">Admin · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-dark small"><?php echo $_SESSION['username']; ?></span>
                                    <img class="img-profile rounded-circle"
                                        src="default_user.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h3 class="mb-3">Attendance</h3>


                        <div class="container mt-4">
                            <button id="markAttendanceBtn" class="btn btn-success btn-mark-attendance mb-3"><i class="bi bi-plus-circle me-2"></i>Mark Attendance</button>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropdown" style="float: right;">
                                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="downloadButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Download Attendance Report">
                                                    <i class="fa fa-download"></i> Download Report
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="downloadButton">
                                                    <a class="dropdown-item" href="#" id="downloadExcel"><i class="fa fa-file-excel text-success"></i> Excel</a>
                                                    <a class="dropdown-item" href="#" id="downloadText"><i class="fa fa-file"></i> Text</a>
                                                </div>
                                            </div>
                                            <h5 class="card-title">Attendance Calendar</h5>

                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Handling download button click events
                                document.getElementById('downloadExcel').addEventListener('click', function() {
                                    window.location.href = 'generate_report.php?format=excel'; // Trigger Excel download
                                });

                                document.getElementById('downloadText').addEventListener('click', function() {
                                    window.location.href = 'generate_report.php?format=text'; // Trigger Text download
                                });

                                // Initialize FullCalendar
                                var calendarEl = document.getElementById('calendar');
                                var leaveDates = new Set(); // Store leave dates for quick lookup

                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    events: function(fetchInfo, successCallback, failureCallback) {
                                        // Fetch attendance data
                                        fetch('fetch_attendance.php')
                                            .then(response => response.json())
                                            .then(attendanceData => {
                                                // Fetch leave data
                                                fetch('fetch_leave_requests.php')
                                                    .then(response => response.json())
                                                    .then(leaveData => {
                                                        // Store leave dates in Set for quick lookup
                                                        leaveData.forEach(event => {
                                                            leaveDates.add(event.start);
                                                        });

                                                        // Merge attendance and leave events
                                                        const allEvents = [...attendanceData, ...leaveData];
                                                        successCallback(allEvents);
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching leave data:', error);
                                                        failureCallback(error);
                                                    });
                                            })
                                            .catch(error => {
                                                console.error('Error fetching attendance data:', error);
                                                failureCallback(error);
                                            });
                                    }
                                });
                                calendar.render();

                                // Mark Attendance Button
                                var markAttendanceBtn = document.getElementById('markAttendanceBtn');

                                markAttendanceBtn.addEventListener('click', function() {
                                    // Get the local date in YYYY-MM-DD format
                                    var localDate = new Date();
                                    var year = localDate.getFullYear();
                                    var month = ('0' + (localDate.getMonth() + 1)).slice(-2);
                                    var day = ('0' + localDate.getDate()).slice(-2);
                                    var formattedDate = `${year}-${month}-${day}`;

                                    // Check if the date is a leave date
                                    if (leaveDates.has(formattedDate)) {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Warning',
                                            text: 'Attendance cannot be marked on a leave day.',
                                            confirmButtonText: 'OK'
                                        });
                                        return; // Exit if it's a leave date
                                    }

                                    // Send request to mark attendance
                                    fetch('mark_attendance.php', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded'
                                            },
                                            body: `date=${formattedDate}`
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Success',
                                                    text: data.message,
                                                    confirmButtonText: 'OK'
                                                });
                                                calendar.refetchEvents(); // Refresh calendar to show new attendance entry
                                                markAttendanceBtn.disabled = true; // Disable button after marking attendance
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: data.message,
                                                    confirmButtonText: 'OK'
                                                });
                                                if (data.message.includes("already marked")) {
                                                    markAttendanceBtn.disabled = true; // Disable button if attendance already marked
                                                }
                                            }
                                        })
                                        .catch(error => console.error('Error marking attendance:', error));
                                });
                            });
                        </script>




                    </div>

                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Attendance Management System.co 2024</span>
                        </div>
                    </div>
                </footer>


            </div>

        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    </body>

    </html>