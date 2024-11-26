<?php
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

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Order - RestroServe</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet"
href="../css/admin.css">
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
                <div id="order-form" style="display: block;">
                    <h2 id="form-title">Are you sure you want to delete this order?</h2>
                    <form action="order-proses.php" method="post" id="order-item-form">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button type="submit" class="btn-primary" name="hapus">Yes</button>
                        <a href="order.php" class="btn-secondary">No</a>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>

