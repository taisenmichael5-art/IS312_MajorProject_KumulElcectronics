<?php
session_start();
include 'db_connect.php';

$sql = "SELECT products.*,
        (SELECT SrcURL FROM productimage 
         WHERE productimage.PID = products.PID 
         LIMIT 1) AS SrcURL
        FROM products";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Kumul Electronics</title>

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="css/products.css">
</head>

<body>

<header class="main-header">

    <div class="logo">
        <h1>Kumul<span>Electronics</span></h1>
    </div>

    <nav class="nav-links">
        <a href="products.php" class="nav-item">Products</a>
        <a href="dashboard.php" class="nav-item">Dashboard</a>
        <a href="logout.php" class="nav-item">Logout</a>
    </nav>

</header>

<main class="store-container">

    <h2 class="section-title">Trending Products</h2>

    <div class="products-grid">

        <?php while($row = mysqli_fetch_assoc($result)): ?>

        <div class="product-card">

            <div class="product-media">

                <img 
                src="<?php echo !empty($row['SrcURL']) ? $row['SrcURL'] : 'images/default.jpg'; ?>"
                alt="<?php echo $row['ProductName']; ?>">

            </div>

            <div class="product-details">

                <span class="brand-tag">
                    <?php echo $row['Brand']; ?>
                </span>

                <h4 class="item-title">
                    <?php echo $row['ProductName']; ?>
                </h4>

                <p class="description">
                    <?php echo $row['Description']; ?>
                </p>

                <div class="price-text">
                    K<?php echo number_format($row['Price'], 2); ?>
                </div>

                <a href="product_details.php?id=<?php echo $row['PID']; ?>" class="view-btn">
                    View Product
                </a>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</main>

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