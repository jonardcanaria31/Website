<?php
session_start();

// Database connection
$servername = "localhost"; // Your server name (e.g., localhost, or IP address)
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "login"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total orders (count rows in orders table)
$totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders";
$totalOrdersResult = $conn->query($totalOrdersQuery);
$totalOrders = $totalOrdersResult->fetch_assoc()['total_orders'];

// Fetch total products (count rows in products table)
$totalProductsQuery = "SELECT COUNT(*) AS total_products FROM products";
$totalProductsResult = $conn->query($totalProductsQuery);
$totalProducts = $totalProductsResult->fetch_assoc()['total_products'];

// Fetch available products (stock > 0)
$availableProductsQuery = "SELECT COUNT(*) AS available_products FROM products WHERE stock > 0";
$availableProductsResult = $conn->query($availableProductsQuery);
$availableProducts = $availableProductsResult->fetch_assoc()['available_products'];

// Fetch total users (count rows in users table)
$totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users";
$totalUsersResult = $conn->query($totalUsersQuery);
$totalUsers = $totalUsersResult->fetch_assoc()['total_users'];

// Fetch total price from orders
$totalPriceQuery = "SELECT SUM(total_price) AS total_price FROM orders";
$totalPriceResult = $conn->query($totalPriceQuery);
$totalPrice = $totalPriceResult->fetch_assoc()['total_price'];

// Fetch recent transactions (order details)
$recentTransactionsQuery = "SELECT o.id AS order_id, u.fName AS customer_name, o.created_at, o.total_price
                            FROM orders o
                            JOIN users u ON o.user_id = u.id
                            ORDER BY o.created_at DESC LIMIT 5"; // Fetch last 5 orders
$recentTransactionsResult = $conn->query($recentTransactionsQuery);

// Close the database connection after fetching data
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="db.css">
</head>
<body>

<aside>
    <div class="logo">Goffee</div>
    <ul>
        <li><a href="Dashboard.php" class="active">Dashboard</a></li>
        <li><a href="Product.php">Products</a></li>
        <li><a href="Orders.php">Orders</a></li>
        <li><a href="Customer.php">Users</a></li>
        <li><a href="Settings.php">Settings</a></li>
        <li><a href="#">Log out</a></li>
        <li><a href="Home.php">Go to Main Store</a></li>
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content">
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <h3>Welcome to the Admin Dashboard</h3>
            <p>Here you can manage your store's products, orders, customers, and settings.</p>

            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <h5>Total Orders</h5>
                        <p><?php echo $totalOrders; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <h5>Total Users</h5>
                        <p><?php echo $totalUsers; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <h5>Total Products</h5>
                        <p><?php echo $totalProducts; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <h5>Available Products</h5>
                        <p><?php echo $availableProducts; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <h5>Total Revenue</h5>
                        <p>$<?php echo number_format($totalPrice, 2); ?></p> <!-- Display total revenue -->
                    </div>
                </div>
            </div>

            <!-- Recent Transactions Table -->
            <div class="card mt-4">
                <div class="card-header">Recent Transactions</div>
                <div class="card-body">
                    <table class="table table-bordered transactions-table">
                        <thead>
                            <tr>
                                <th>Order Name</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $recentTransactionsResult->fetch_assoc()) { ?>
                                <tr>
                                    <td>Order #<?php echo $row['order_id']; ?></td>
                                    <td><?php echo $row['customer_name']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td>$<?php echo number_format($row['total_price'], 2); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Go to Orders Button -->
            <a href="Orders.php" class="go-to-orders-btn">Go to Orders</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
