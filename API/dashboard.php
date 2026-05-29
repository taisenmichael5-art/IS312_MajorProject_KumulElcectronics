<?php
session_start();
if(!isset($_SESSION['UserID'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- LINK CSS FILE -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

<header class="main-header">
    <div class="logo">
        Kumul<span>Electronics</span>
    </div>

    <div class="nav-links">
        <a href="products.php">Products</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</header>

<div class="container">

    <!-- WELCOME -->
    <div class="welcome-box">
        <h1>Welcome, <?php echo $_SESSION['Username']; ?> 👋</h1>
        <p>Browse products, explore features, and share your reviews.</p>
    </div>

    <!-- QUICK STATS -->
    <div class="stats">

        <div class="stat-card">
            <h2>🛒</h2>
            <p>Browse Products</p>
        </div>

        <div class="stat-card">
            <h2>⭐</h2>
            <p>Write Reviews</p>
        </div>

        <div class="stat-card">
            <h2>📦</h2>
            <p>View Orders</p>
        </div>

    </div>

    <!-- ACTIONS -->
    <h2 class="section-title">Quick Actions</h2>

    <div class="actions">

        <a href="products.php" class="card primary">
            <div class="card-icon">🛒</div>
            <h3>Browse Products</h3>
            <p>View all products and explore details</p>
        </a>

        <a href="products.php" class="card">
            <div class="card-icon">📱</div>
            <h3>View Products</h3>
            <p>Open product listing and details</p>
        </a>

        <a href="products.php" class="card">
            <div class="card-icon">✍️</div>
            <h3>Add Review</h3>
            <p>Select a product and write a review</p>
        </a>

        <a href="#" class="card">
            <div class="card-icon">⭐</div>
            <h3>My Reviews</h3>
            <p>View your submitted reviews</p>
        </a>

        <a href="logout.php" class="card">
            <div class="card-icon">🚪</div>
            <h3>Logout</h3>
            <p>Sign out of your account</p>
        </a>

    </div>

</div>

<footer class="main-footer">

    <div class="footer-grid">

        <div class="footer-column">
            <h4>About Kumul Electronics</h4>
            <p>Providing premium high-end tech across Papua New Guinea.</p>
        </div>

        <div class="footer-column">
            <h4>Fulfillment Partners</h4>
            <ul>
                <li><strong>Tech Supply PNG</strong><br>Port Moresby</li>
                <li><strong>Global Electronics Ltd</strong><br>Lae</li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Regional Logistics</h4>
            <ul>
                <li><strong>Pacific Imports</strong><br>Madang</li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Kumul Electronics. All Rights Reserved.</p>
    </div>

</footer>

</body>
</html>