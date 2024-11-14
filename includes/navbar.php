<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../assets/images/AMS.png" alt="Logo" width="80" height="30" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Leaves</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Reports</a>
                </li> -->
            </ul>

            <div class="d-flex align-items-center">
                <button class="btn btn-link text-dark me-3" type="button">
                    <i class="bi bi-bell"></i>
                </button>
                <button class="btn btn-link text-dark me-3" type="button">
                    <i class="bi bi-chat-square-text"></i>
                </button>

                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/32" alt="User Avatar" class="user-avatar me-2">
                        <span class="d-none d-lg-inline" style="text-decoration:none !important"><?php echo $_SESSION['username']; ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="my_profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Attendance</a></li>
                        <li><a class="dropdown-item" href="#">Leaves</a></li>
                        <li><a class="dropdown-item" href="#">Reports</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>