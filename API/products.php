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

    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .main-header {
            background: #111;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
        }

        .main-header h1 span {
            color: #007bff;
        }

        .store-container {
            padding: 40px;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-media {
            height: 180px;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .product-details {
            padding: 15px;
        }

        .brand-tag {
            font-size: 12px;
            color: #777;
        }

        .item-title {
            font-size: 18px;
            margin: 5px 0;
        }

        .description {
            font-size: 13px;
            color: #555;
            margin-bottom: 8px;
        }

        .price-text {
            font-size: 18px;
            color: #007bff;
            font-weight: bold;
        }

        .view-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background: #007bff;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .view-btn:hover {
            background: #0056b3;
        }
	/* FOOTER */
.main-footer {
    background: #1e2a38;
    color: #bdc3c7;
    padding: 50px 6% 20px;
    margin-top: 60px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    padding-bottom: 30px;
}

.footer-column h4 {
    color: #ffffff;
    margin-bottom: 15px;
    font-size: 14px;
}

.footer-column p,
.footer-column li {
    font-size: 14px;
    line-height: 1.6;
}

.footer-column strong {
    color: #ffffff;
}

.footer-bottom {
    text-align: center;
    margin-top: 20px;
    font-size: 13px;
    color: #9aa4af;
}

    </style>
</head>

<body>

<header class="main-header">
    <div class="logo">
        <h1>Kumul<span>Electronics</span></h1>
    </div>
    <nav class="nav-links">
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
                <!-- Optional: Add image field later -->
                <img src="<?php echo !empty($row['SrcURL']) ? $row['SrcURL'] : 'images/default.jpg'; ?>"
     alt="<?php echo $row['ProductName']; ?>">

            </div>

            <div class="product-details">

                <span class="brand-tag"><?php echo $row['Brand']; ?></span>

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