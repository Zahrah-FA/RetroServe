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
            <form action="login-proses.php" method="post">
                <input type="text" name="username" id="loginName" placeholder="Name" required>
                <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                <button type="submit" class="btn-primary" name="login" >Login</button>
            </form>
            <?php if (isset($errorMessage)) {
                echo "<p style='color:red;'>$errorMessage</p>";
            } ?>
            <p>Don't have an account? <a href="register.php" id="showRegister">Register</a></p>
        </div>
    </main>

    <div id="snackbar"></div>

    <script src="js/script.js"></script>
</body>

</html>