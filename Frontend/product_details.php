<?php
session_start();
include 'db_connect.php';

$pid = $_GET['id'];

/* GET PRODUCT */
$product_sql = "SELECT * FROM products WHERE PID='$pid'";
$product_result = mysqli_query($conn, $product_sql);
$product = mysqli_fetch_assoc($product_result);

/* GET PRODUCT IMAGE */
$image_sql = "SELECT * FROM productimage WHERE PID='$pid' LIMIT 1";
$image_result = mysqli_query($conn, $image_sql);
$image = mysqli_fetch_assoc($image_result);

/* SUBMIT REVIEW */
if (isset($_POST['submit_review'])) {
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $date = date('Y-m-d');
    $userid = $_SESSION['UserID'];

    $review_sql = "INSERT INTO reviews 
    (Rating, ReviewText, ReviewDate, UserID, PID)
    VALUES 
    ('$rating','$review','$date','$userid','$pid')";

    mysqli_query($conn, $review_sql);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Details</title>

<style>
body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #eef2f7;
    margin: 0;
}

/* HEADER */
.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #1e2a38;
    padding: 15px 40px;
    color: white;
}

.main-header h2 {
    margin: 0;
    letter-spacing: 1px;
}

.nav-links a {
    color: white;
    margin-left: 25px;
    text-decoration: none;
    font-weight: 500;
}

.nav-links a:hover {
    color: #ff9800;
}

/* CONTAINER */
.container {
    width: 85%;
    margin: 40px auto;
}

/* PRODUCT CARD */
.product-box {
    display: flex;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

/* IMAGE */
.product-image img {
    width: 100%;
    max-width: 420px;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.product-image img:hover {
    transform: scale(1.05);
}

/* INFO */
.product-info {
    padding-left: 40px;
}

.product-info h1 {
    margin-top: 0;
    font-size: 28px;
}

.brand {
    color: #777;
    font-size: 14px;
}

.price {
    color: #e67e22;
    font-size: 28px;
    font-weight: bold;
    margin: 15px 0;
}

.description {
    margin-top: 10px;
    color: #444;
    line-height: 1.6;
}

/* BUTTON */
.buy-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 25px;
    background: linear-gradient(45deg, #ff9800, #ff5722);
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
}

.buy-btn:hover {
    opacity: 0.9;
}

/* REVIEW BOX */
.review-box {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    margin-top: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

/* FORM */
.review-form {
    display: flex;
    flex-direction: column;
}

.review-form label {
    margin-top: 10px;
    font-weight: 600;
}

/* INPUT + SELECT */
.review-form select,
.review-form textarea {
    margin-top: 6px;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

/* TEXTAREA */
.review-form textarea {
    height: 100px;
    resize: none;
}

/* BUTTON */
.review-form button {
    margin-top: 15px;
    padding: 12px;
    background: linear-gradient(45deg, #4da3ff, #2d8ae0);
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}

.review-form button:hover {
    opacity: 0.9;
}

/* REVIEW CARD */
.review-card {
    border-bottom: 1px solid #eee;
    padding: 15px 0;
}

/* HEADER */
.review-header {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
}

/* DATE */
.review-date {
    color: #888;
}

/* STARS */
.stars {
    color: #f5b50a;
    font-size: 16px;
    margin: 5px 0;
}

/* TEXT */
.review-text {
    font-size: 14px;
    color: #444;
}
</style>

</head>
<body>

<!-- HEADER -->
<header class="main-header">
    <h2>Kumul Electronics</h2>
    <div class="nav-links">
        <a href="products.php">Products</a>
        <a href="login.php">Login</a>
    </div>
</header>

<div class="container">

<!-- PRODUCT -->
<div class="product-box">

   <div class="productimage">
   <img src="<?php echo $image['SrcURL']; ?>"
     alt="<?php echo $product['ProductName']; ?>">
</div>

    <div class="product-info">
        <h1><?php echo $product['ProductName']; ?></h1>

        <p class="brand">Brand: <?php echo $product['Brand']; ?></p>

        <p class="price">K<?php echo $product['Price']; ?></p>

        <p class="description"><?php echo $product['Description']; ?></p>
    </div>

</div>

<!-- REVIEW FORM -->
<div class="review-box">
    <h2>Write a Review</h2>

    <form method="POST" class="review-form">

        <label>Rating</label>
        <select name="rating" required>
            <option value="">Select rating</option>
            <option value="5">★★★★★ (5)</option>
            <option value="4">★★★★☆ (4)</option>
            <option value="3">★★★☆☆ (3)</option>
            <option value="2">★★☆☆☆ (2)</option>
            <option value="1">★☆☆☆☆ (1)</option>
        </select>

        <label>Your Review</label>
        <textarea name="review" placeholder="Share your experience..." required></textarea>

        <button type="submit" name="submit_review">Submit Review</button>
    </form>
</div>


<!-- REVIEW DISPLAY -->
<div class="review-box">
    <h2>Customer Reviews</h2>

<?php
$reviews_sql = "SELECT reviews.*, users.Username
FROM reviews
INNER JOIN users ON reviews.UserID = users.UserID
WHERE PID='$pid'";

$reviews_result = mysqli_query($conn, $reviews_sql);

while ($review = mysqli_fetch_assoc($reviews_result)) {
    $stars = str_repeat("★", $review['Rating']) . str_repeat("☆", 5-$review['Rating']);
?>

<div class="review-card">

    <div class="review-header">
        <strong><?php echo $review['Username']; ?></strong>
        <span class="review-date"><?php echo $review['ReviewDate']; ?></span>
    </div>

    <div class="stars"><?php echo $stars; ?></div>

    <p class="review-text"><?php echo $review['ReviewText']; ?></p>

</div>

<?php } ?>

</div>

</div>

</body>
</html>
