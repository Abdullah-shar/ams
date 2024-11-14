<?php
include '../includes/config.php';
session_start();

if (isset($_SESSION['admin_id'])) {
    // If user is already logged in, redirect to the dashboard
    header('Location: admin_dashboard.php');
    exit();
}

$email_error = $password_error = '';

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form data
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Query to fetch admin by email
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['admin_id'];
            $_SESSION['username'] = $user['username'];

            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "success",
                            title: "Login Successful!",
                            text: "Redirecting to your dashboard...",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "admin_dashboard.php";
                        });
                    });
                  </script>';
        } else {
            $password_error = 'Incorrect password!';
        }
    } else {
        $email_error = 'Email not found!';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            background-color: #CED1BC;
        }

        .left-side {
            flex: 1;
            background-image: url('../assets/images/login_bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="split-screen">
        <div class="left-side"></div>
        <div class="right-side">
            <div class="login-container">
                <div class="login-header">
                    <h2>Welcome Back!</h2>
                    <p>Please login to your account</p>
                </div>
                <form method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                        <label class="text-muted">Email address</label>
                        <?php if ($email_error): ?>
                            <div class="text-danger mt-1"><?= htmlspecialchars($email_error) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <label class="text-muted">Password</label>
                        <?php if ($password_error): ?>
                            <div class="text-danger mt-1"><?= htmlspecialchars($password_error) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-login" type="submit" name="submit">Sign in</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none">Forgot password?</a>
                    </div>
                </form>
                <div class="social-login">
                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>