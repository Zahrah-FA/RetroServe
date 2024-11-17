<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestroServe - Modern Restaurant Services</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
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
        <!-- Tambahkan elemen untuk pesan salam -->
        <div id="greeting-message" class="greeting"></div>
    </header>

    <main style="background-image: url(foto/latar_belakang.png);background-attachment: fixed;">
        <section id="hero">
            <h1>RestroServe</h1>
            <p>Layanan Restoran Modern dalam Genggaman</p>
        </section>

        <section id="features">
            <h2>Our Features</h2>
            <div class="feature-grid">
                <div class="feature-item">
                    <h3>Modern Interface</h3>
                    <p>Sleek and intuitive design for easy navigation</p>
                </div>
                <div class="feature-item">
                    <h3>Efficient Order Management</h3>
                    <p>Streamline your restaurant operations</p>
                </div>
                <div class="feature-item">
                    <h3>Real-time Analytics</h3>
                    <p>Make data-driven decisions for your business</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 RestroServe. All rights reserved.</p>
    </footer>

    <script>
        // Fungsi untuk mengatur pesan salam berdasarkan waktu
        function setGreetingMessage() {
            const now = new Date();
            const hour = now.getHours();
            let greeting;

            if (hour < 12) {
                greeting = "Good Morning! Welcome to RestroServe.";
            } else if (hour < 18) {
                greeting = "Good Afternoon! Enjoy our services.";
            } else {
                greeting = "Good Evening! Explore our features.";
            }

            document.getElementById('greeting-message').textContent = greeting;
        }

        // Panggil fungsi setelah halaman dimuat
        window.onload = setGreetingMessage;
    </script>
</body>
</html>
