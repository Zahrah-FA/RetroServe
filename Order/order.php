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
                    <li><a href="../dashboard.php" class="active" data-section="dashboard">Dashboard</a></li>
                    <li><a href="../Menu/menu.php">Menu</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="../report/report.php">Report</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <input type="search" placeholder="Search...">
                <div class="user-menu">
                    <img src="/placeholder.svg?height=40&width=40" alt="User Avatar" class="avatar">
                    <span class="username">John Doe</span>
                </div>
            </header>

            <section id="order-section" class="order-content">
                <h1>Order Management</h1>
                <button id="add-order-btn" class="btn-primary">Add New Order</button>
                <div id="order-form" style="display: none;">
                    <h2 id="order-form-title">Add New Order</h2>
                    <form id="order-item-form">
                        <input type="hidden" id="order-id">
                        <div class="form-group">
                            <label for="order-customer">Customer Name:</label>
                            <input type="text" id="order-customer" required>
                        </div>
                        <div class="form-group">
                            <label for="order-items">Items:</label>
                            <select id="order-items" multiple required>
                                <!-- Menu items will be dynamically added here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="order-total">Total:</label>
                            <input type="number" id="order-total" readonly>
                        </div>
                        <div class="form-group">
                            <label for="order-status">Status:</label>
                            <select id="order-status" required>
                                <option value="pending">Pending</option>
                                <option value="preparing">Preparing</option>
                                <option value="ready">Ready</option>
                                <option value="delivered">Delivered</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-primary">Save Order</button>
                        <button type="button" id="cancel-order-btn" class="btn-secondary">Cancel</button>
                    </form>
                </div>
                <table id="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="order-items">
                        <!-- Order items will be dynamically added here -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <script src="../js/order.js"></script>
</body>
</html>