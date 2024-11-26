<?php
session_start();
include 'koneksi.php';

// Fetch total sales
$total_sales_query = "SELECT SUM(total) as total_sales FROM tb_order";
$total_sales_result = mysqli_query($koneksi, $total_sales_query);
$total_sales = mysqli_fetch_assoc($total_sales_result)['total_sales'];

// Fetch total number of orders
$total_orders_query = "SELECT COUNT(*) as total_orders FROM tb_order";
$total_orders_result = mysqli_query($koneksi, $total_orders_query);
$total_orders = mysqli_fetch_assoc($total_orders_result)['total_orders'];

// Fetch total number of menu items
$total_menu_items_query = "SELECT COUNT(*) as total_menu_items FROM tb_menu";
$total_menu_items_result = mysqli_query($koneksi, $total_menu_items_query);
$total_menu_items = mysqli_fetch_assoc($total_menu_items_result)['total_menu_items'];

// Fetch top 5 selling products
$top_products_query = "SELECT m.nama, SUM(o.quantity) as total_quantity 
                       FROM tb_order o 
                       JOIN tb_menu m ON o.item = m.id 
                       GROUP BY o.item 
                       ORDER BY total_quantity DESC 
                       LIMIT 5";
$top_products_result = mysqli_query($koneksi, $top_products_query);

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
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <input type="search" placeholder="Search...">
                <div class="user-menu">
                    <img src="foto/user.png" alt="User Avatar" class="avatar">
                    <span class="username"><?php echo $_SESSION['username']; ?></span> 
                </div>
            </header>

            <section id="dashboard-section" class="dashboard-content">
                <h1>Dashboard</h1>
                <div class="date"><?php echo date('d F Y'); ?></div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Total Sales</h3>
                        <p class="stat-value">Rp <?php echo number_format($total_sales, 0, ',', '.'); ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Total Orders</h3>
                        <p class="stat-value"><?php echo $total_orders; ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Menu Items</h3>
                        <p class="stat-value"><?php echo $total_menu_items; ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Average Order Value</h3>
                        <p class="stat-value">Rp <?php echo $total_orders > 0 ? number_format($total_sales / $total_orders, 0, ',', '.') : 0; ?></p>
                    </div>
                </div>

                <div class="dashboard-tables">
                    <div class="table-container">
                        <h3>Top Selling Products</h3>
                        <table>
                            <tr>
                                <th>Product</th>
                                <th>Quantity Sold</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($top_products_result)) : ?>
                            <tr>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['total_quantity']; ?></td>
                            </tr>
                            <?php endwhile; ?>
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

