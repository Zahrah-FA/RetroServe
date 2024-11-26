<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];
if (!isset($_GET['id'])) {
    echo "
    <script>
      alert('No ID detected');
      window.location = 'order.php';
    </script>
  ";
}

$sql = "SELECT * FROM tb_order WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order - RestroServe</title>
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
                <h1>Edit Order</h1>
                <form action="order-proses.php" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="customer">Customer Name:</label>
                        <input type="text" id="customer" name="customer" value="<?= htmlspecialchars($data['customer']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item">Item:</label>
                        <select id="item" name="item" required>
                            <?php
                            $sql = "SELECT * FROM tb_menu";
                            $result = mysqli_query($koneksi, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = ($row['id'] == $data['item']) ? 'selected' : '';
                                echo "<option value='{$row['id']}' $selected>{$row['nama']} - Rp {$row['price']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="<?= $data['quantity'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Preparing" <?= $data['status'] == 'Preparing' ? 'selected' : '' ?>>Preparing</option>
                            <option value="Ready" <?= $data['status'] == 'Ready' ? 'selected' : '' ?>>Ready</option>
                            <option value="Delivered" <?= $data['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary" name="edit">Update Order</button>
                    <a href="order.php" class="btn-secondary">Cancel</a>
                </form>
            </section>
        </main>
    </div>
</body>
</html>

