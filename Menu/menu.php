<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Management - RestroServe</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">RestroServe</div>
            <nav>
                <ul>
                    <li><a href="../dashboard.php" class="active" data-section="dashboard">Dashboard</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="../Order/order.php">Order</a></li>
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

            <section id="menu-section" class="menu-content">
                <h1>Menu Management</h1>
                <button id="add-item-btn" class="btn-primary"><a href="menu-entry.php">Add New Item</a> </button>
                <table id="menu-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="menu-items">
                        <?php
                        include '../koneksi.php';
                        $sql = "SELECT * FROM tb_menu";
                        $result = mysqli_query($koneksi, $sql);
                        if (mysqli_num_rows($result) == 0) {
                            echo "
                        <tr>
                            <td colspan='4' align='center'>
                                Data Kosong
                            </td>
                        </tr>
                            ";
                        }
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "
                    <tr>
                        <td>$data[nama]</td>
                        <td>Rp " . number_format($data['price'], 0, ',', '.') . "</td>
                        <td>$data[kategori]</td>
                        <td>
                            <a class='btn-secondary' href=menu-edit.php?id=$data[id]>
                                Edit
                            </a>  | 
                            <a class='btn-secondary' href=menu-hapus.php?id=$data[id]>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    ";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>

</html>