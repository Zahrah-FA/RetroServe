<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management - RestroServe</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">RestroServe</div>
            <nav>
                <ul>
                    <li><a href="../dashboard.php">Dashboard</a></li>
                    <li><a href="../Menu/menu.php">Menu</a></li>
                    <li><a href="order.php" class="active">Order</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <input type="search" placeholder="Search...">
                <div class="user-menu">
                    <img src="../foto/user.png" alt="User Avatar" class="avatar">
                    <span class="username"><?php echo $_SESSION['username']; ?></span>
                </div>
            </header>

            <section id="order-section" class="order-content">
                <h1>Order Management</h1>
                <button id="add-order-btn" class="btn-primary"><a href="order-entry.php">Add New Order</a></button>
                <a href="order-report.php" class="btn-secondary">Generate Report</a>
                <table id="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="order-items">
                        <?php
                        $sql = "SELECT o.*, m.nama as item_name, m.price 
                                FROM tb_order o 
                                JOIN tb_menu m ON o.item = m.id";
                        $result = mysqli_query($koneksi, $sql);
                        if (mysqli_num_rows($result) == 0) {
                            echo "<tr><td colspan='7' align='center'>No Orders</td></tr>";
                        }
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "
                            <tr>
                                <td>{$data['id']}</td>
                                <td>{$data['customer']}</td>
                                <td>{$data['item_name']}</td>
                                <td>{$data['quantity']}</td>
                                <td>Rp " . number_format($data['total'], 0, ',', '.') . "</td>
                                <td>{$data['status']}</td>
                                <td>
                                    <a class='btn-secondary' href='order-edit.php?id={$data['id']}'>Edit</a> | 
                                    <a class='btn-secondary' href='order-hapus.php?id={$data['id']}'>Delete</a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>

