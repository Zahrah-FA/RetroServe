<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report - RestroServe</title>
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
                    <li><a href="../Order/order.php">Order</a></li>
                    <li><a href="report.php" class="active">Report</a></li>
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

            <section id="report-section" class="report-content">
                <h1>Reports</h1>
                <div class="report-options">
                    <label for="report-type">Report Type:</label>
                    <select id="report-type">
                        <option value="menu">Menu Report</option>
                        <option value="order">Order Report</option>
                    </select>
                    <label for="date-range">Date Range:</label>
                    <input type="date" id="date-from">
                    <input type="date" id="date-to">
                    <button id="generate-report" class="btn-primary">Generate Report</button>
                </div>
                <div id="report-result" class="report-result">
                    <!-- Report will be dynamically generated here -->
                </div>
            </section>
        </main>
    </div>

    <script src="../js/report.js"></script>
</body>
</html>