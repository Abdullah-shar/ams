<?php
include './includes/config.php';

$username_error = $email_error = $roll_error = '';
$show_success_message = false;

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $roll = mysqli_real_escape_string($conn, $_POST['rollnumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) > 0) {
        $username_error = 'Username already exists!';
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $email_error = 'Email already exists!';
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE roll_number = '$roll'");
    if (mysqli_num_rows($result) > 0) {
        $roll_error = 'Roll number already exists!';
    }

    if (empty($username_error) && empty($email_error) && empty($roll_error)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, roll_number, password) VALUES ('$username', '$email', '$roll', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            $show_success_message = true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

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
            background-image: url('./assets/images/login_bg.jpg');
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
                    <h2>Create your account</h2>
                    <?php if (!empty($error_message)): ?>
                        <div id="error-message" class="alert alert-danger mt-3" role="alert">
                            <?= htmlspecialchars($error_message); ?>
                        </div>
                    <?php endif; ?>
                    <div class="signup-link text-center">
                        Already have an account? <a href="index.php" class="text-decoration-none">Login</a>
                    </div>
                </div>
                <form method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Your good name">
                        <label for="floatingInput" class="text-muted">Your name</label>
                        <?php if (!empty($username_error)): ?>
                            <div class="text-danger mt-1"><?= htmlspecialchars($username_error); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput" class="text-muted">Email address</label>
                        <?php if (!empty($email_error)): ?>
                            <div class="text-danger mt-1"><?= htmlspecialchars($email_error); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="rollnumber" placeholder="name@example.com">
                        <label for="floatingInput" class="text-muted">Roll Number</label>
                        <?php if (!empty($roll_error)): ?>
                            <div class="text-danger mt-1"><?= htmlspecialchars($roll_error); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword" class="text-muted">Password</label>

                    </div>
                    <div class="d-grid">
                        <button class="btn btn-login" name="submit" type="submit">Register</button>
                    </div>

                </form>
                <div class="social-login">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <?php if ($show_success_message): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Registration Successful!",
                    text: "Redirecting to login page...",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "index.php";
                });
            });
        </script>
    <?php endif; ?>
</body>

</html>