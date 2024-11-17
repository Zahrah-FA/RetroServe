<?php
session_start(); // Start the session at the very beginning
if (!isset($_SESSION)) {
    die("Session could not be started.");
}
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['loginName'];
    $password = $_POST['loginPassword'];
    
    // Simple login validation example
    if ($username === 'admin' && $password === '1234') {
        // Successful login
        $_SESSION['loginName'] = $username; // Set session variable
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $errorMessage = "Login failed! Please check your credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RestroServe</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="auth-page">
    <header>
        <nav>
            <div class="logo">RestroServe</div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="login.php" class="btn-login">Login</a></li>
            </ul>
        </nav>
    </header>

    <main style="background-image: url(foto/latar_belakang.png);background-attachment: fixed;">
        <div class="auth-container">
            <h1>Login</h1>
            <form id="loginForm" method="POST">
                <input type="text" name="loginName" id="loginName" placeholder="Name" required>
                <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required>
                <button type="submit" class="btn-primary">Login</button>
            </form>
            <?php if (isset($errorMessage)) {
                echo "<p style='color:red;'>$errorMessage</p>";
            } ?>
            <p>Don't have an account? <a href="#" id="showRegister">Register</a></p>
        </div>
        <div class="auth-container" id="registerContainer" style="display: none;">
            <h1>Register</h1>
            <form id="registerForm">
                <input type="text" id="registerName" placeholder="Name" required>
                <input type="password" id="registerPassword" placeholder="Password" required>
                <input type="email" id="registerEmail" placeholder="Email" required>
                <button type="submit" class="btn-primary">Register</button>
            </form>
            <p>Already have an account? <a href="#" id="showLogin">Login</a></p>
        </div>
    </main>

    <div id="snackbar"></div>

    <script src="js/script.js"></script>
</body>

</html>