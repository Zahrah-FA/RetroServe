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
                <div id="menu-form" style="display: block;">
                    <h2 id="form-title">Add New Menu Item</h2>
                    <form action="menu-proses.php" method="post" id="menu-item-form">
                        <div class="form-group">
                            <label for="item-name">Name:</label>
                            <input type="text" id="item-name" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="item-price">Price:</label>
                            <input type="number" id="item-price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="item-category">Category:</label>
                            <select id="item-category" name="kategori" required>
                                <option value="appetizer">Appetizer</option>
                                <option value="main-course">Main Course</option>
                                <option value="dessert">Dessert</option>
                                <option value="beverage">Beverage</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-primary" name="simpan">Save</button>
                        <button type="button" id="cancel-btn" class="btn-secondary"><a href="menu.php">Cancel</a></button>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <!-- <script src="../js/menu.js"></script> -->
</body>

</html>