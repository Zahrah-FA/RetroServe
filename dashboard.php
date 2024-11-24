<?php
session_start();
if (!isset($_SESSION['loginName'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - RestroServe</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">RestroServe</div>
            <nav>
                <ul style="display: block;">
                    <li><a href="#" class="active" data-section="dashboard">Dashboard</a></li>
                    <li><a href="Menu/menu.php">Menu</a></li>
                    <li><a href="Order/order.php">Order</a></li>
                    <li><a href="report/report.php">Report</a></li>
                    <li><a href="logout.php">Logout</a></li> <!-- Logout -->
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <input type="search" placeholder="Search...">
                <div class="user-menu">
                    <img src="foto/user.png" alt="User Avatar" class="avatar">
                    <span class="username"><?php echo $_SESSION['loginName']; ?></span> 
                </div>
            </header>

            <section id="dashboard-section" class="dashboard-content">
                <h1>Dashboard</h1>
                <div class="date">29 September 2024</div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Total Penjualan</h3>
                        <p class="stat-value">Rp 000.000</p>
                    </div>
                    <div class="stat-card">
                        <h3>Penjualan E-commerce</h3>
                        <p class="stat-value">Rp 0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Laba Kotor</h3>
                        <p class="stat-value">Rp 0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Penjualan Kotor</h3>
                        <p class="stat-value">Rp 0</p>
                    </div>
                </div>

                <div class="dashboard-tables">
                    <div class="table-container">
                        <h3>Produk Terlaris</h3>
                        <table>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                            </tr>
                            <tr>
                                <td>Makanan A</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>Makanan B</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>Makanan C</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>Makanan D</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>Makanan E</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-container">
                        <h3>Metode Pembayaran</h3>
                        <table>
                            <tr>
                                <th>Metode</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>Tunai</td>
                                <td>Rp 0</td>
                            </tr>
                            <tr>
                                <td>QRIS</td>
                                <td>Rp 0</td>
                            </tr>
                            <tr>
                                <td>Bank transfer</td>
                                <td>Rp 0</td>
                            </tr>
                            <tr>
                                <td>E-Wallet</td>
                                <td>Rp 0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <div id="snackbar"></div>
    <script src="js/script.js"></script>
</body>

</html>