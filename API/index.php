<?php
$pageTitle = "Kumul Electronics";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>

<link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="main-header">
    <div class="logo">
        <h1>Kumul<span>Electronics</span></h1>
    </div>

    <nav class="nav-links">
        <a href="index.php">Home</a>
        <a href="login.php?redirect=products.php">Products</a>
        <a href="login.php">Login</a>
        <a href="register.php" class="btn-auth">Register</a>
    </nav>
</header>

<!-- HERO -->
<section class="hero">
    <video autoplay muted loop playsinline>
        <source src="video/0.mp4" type="video/mp4">
    </video>

    <div class="hero-content">
        <h2>Your Next Tech Upgrade Awaits</h2>
        <p>Explore the latest devices and deals</p>
        <a href="login.php?redirect=products.php" class="btn">Browse Products</a>
    </div>
</section>

<section class="store-section">
    <h3 class="section-title">Browse Categories</h3>

    <div class="categories-layout">

        <a href="laptop.html" class="category-card">
            <div class="icon">💻</div>
            <h4>Laptops</h4>
        </a>

        <a href="smartphones.html" class="category-card">
            <div class="icon">📱</div>
            <h4>Smartphones</h4>
        </a>

        <a href="accessories.html" class="category-card">
            <div class="icon">🎧</div>
            <h4>Accessories</h4>
        </a>

    </div>
</section>

<main class="store-container">

<?php
$products = [

["brand"=>"Apple","name"=>"iPhone 15 Pro Max","img"=>"1.jpg","stock"=>"In Stock","price"=>"K6,999.00","rating"=>"★★★★★"],

["brand"=>"Samsung","name"=>"Samsung Galaxy S25 Ultra","img"=>"02.jpg","stock"=>"In Stock","price"=>"K6,499.00","rating"=>"★★★★★"],

["brand"=>"ASUS","name"=>"ASUS ROG Strix G16","img"=>"3.jpg","stock"=>"In Stock","price"=>"K9,200.00","rating"=>"★★★★☆"],

["brand"=>"Dell","name"=>"Dell XPS 15","img"=>"4.jpg","stock"=>"Low Stock","price"=>"K8,700.00","rating"=>"★★★★★"],

["brand"=>"Sony","name"=>"Sony Bravia OLED TV","img"=>"5.jpg","stock"=>"In Stock","price"=>"K5,400.00","rating"=>"★★★★☆"],

["brand"=>"Apple","name"=>"AirPods Pro 2","img"=>"6.jpg","stock"=>"In Stock","price"=>"K1,200.00","rating"=>"★★★★★"],

["brand"=>"Logitech","name"=>"Logitech MX Master 3S","img"=>"7.jpg","stock"=>"In Stock","price"=>"K550.00","rating"=>"★★★★☆"],

["brand"=>"Canon","name"=>"Canon EOS R6 Mark II","img"=>"8.jpg","stock"=>"In Stock","price"=>"K9,800.00","rating"=>"★★★★★"],

["brand"=>"HP","name"=>"HP Spectre x360","img"=>"9.jpg","stock"=>"Low Stock","price"=>"K8,800.00","rating"=>"★★★★☆"],

["brand"=>"Lenovo","name"=>"ThinkPad X1 Carbon","img"=>"10.jpg","stock"=>"In Stock","price"=>"K9,100.00","rating"=>"★★★★★"],

["brand"=>"Microsoft","name"=>"Surface Pro 9","img"=>"11.jpg","stock"=>"In Stock","price"=>"K7,800.00","rating"=>"★★★★☆"],

["brand"=>"Acer","name"=>"Acer Predator Helios","img"=>"12.jpg","stock"=>"In Stock","price"=>"K8,500.00","rating"=>"★★★★☆"],

["brand"=>"Razer","name"=>"Razer Blade 15","img"=>"13.jpg","stock"=>"In Stock","price"=>"K10,500.00","rating"=>"★★★★★"],

["brand"=>"Google","name"=>"Google Pixel 8 Pro","img"=>"14.jpg","stock"=>"In Stock","price"=>"K6,200.00","rating"=>"★★★★☆"],

["brand"=>"OnePlus","name"=>"OnePlus 12","img"=>"15.jpg","stock"=>"In Stock","price"=>"K5,800.00","rating"=>"★★★★☆"],


];

?>

<section>
<h2 style="margin:20px">Featured Devices</h2>

<div class="products-grid">

<?php foreach ($products as $p): ?>

<div class="product-card">
    <div class="product-media">
        <img src="images/<?php echo $p['img']; ?>"
             onerror="this.src='https://via.placeholder.com/300x200'"
             alt="">
    </div>

    <div class="product-details">
        <span class="brand-tag"><?php echo $p['brand']; ?></span>
        <div class="item-title"><?php echo $p['name']; ?></div>
        <span class="stock-badge"><?php echo $p['stock']; ?></span>
        <div class="price-text"><?php echo $p['price']; ?></div>
    </div>
</div>

<?php endforeach; ?>

</div>
</section>

</main>

<footer class="main-footer">
    <div class="footer-grid">

        <div class="footer-column">
            <h4>ABOUT KUMUL ELECTRONICS</h4>
            <p>Providing premium high-end tech across Papua New Guinea.</p>
        </div>

        <div class="footer-column">
            <h4>FULFILLMENT PARTNERS</h4>
            <ul>
                <li><strong>Tech Supply PNG</strong><br>Port Moresby</li>
                <li><strong>Global Electronics Ltd</strong><br>Lae</li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>REGIONAL LOGISTICS</h4>
            <ul>
                <li><strong>Pacific Imports</strong><br>Madang</li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© <?php echo date("Y"); ?> Kumul Electronics. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
