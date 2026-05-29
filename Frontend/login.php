<?php
session_start();
include 'db_connect.php';

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users 
            WHERE Email='$email' 
            AND Password='$password'";

    $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['UserID'] = $row['UserID'];
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['Email'] = $row['Email'];

    // ✅ PUT IT HERE (NOT in HTML)
    if (isset($_GET['redirect'])) {
        header("Location: " . $_GET['redirect']);
    } else {
        header("Location: dashboard.php");
    }
    exit();
} else {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kumul Electronics</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/1.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
        }

        .login-card h2 {
            margin-bottom: 20px;
            color: #222;
        }

        .login-card input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .login-card input:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #0056b3;
        }

        .link {
            margin-top: 15px;
            display: block;
            font-size: 14px;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .error-msg {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .brand-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .brand-title span {
            color: #007bff;
        }
		/* Global Footer Layout Styling */
.main-footer {
    background-color: var(--color-primary);
    color: #bdc3c7;
    padding: 50px 6% 20px;
    margin-top: 80px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-column h4 {
    color: #ffffff;
    font-size: 16px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.footer-column p {
    font-size: 14px;
    line-height: 1.6;
}

.supplier-list {
    list-style: none;
}

.supplier-list li {
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 15px;
    border-left: 2px solid var(--color-accent);
    padding-left: 10px;
}

.supplier-list strong {
    color: #ffffff;
}

.footer-bottom {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.08);
    font-size: 12px;
}
/* Flexbox Header Navigation Bar Layout */
.main-header {
    background-color: var(--color-primary);
    color: #ffffff;
    padding: 16px 6%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
}

.logo h1 {
    font-size: 22px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.logo h1 span {
    color: var(--color-accent);
}

.nav-links {
    display: flex;
    align-items: center;
}

.nav-item {
    color: #ffffff;
    text-decoration: none;
    margin-left: 24px;
    font-size: 15px;
    font-weight: 500;
    transition: color 0.25s ease;
}

.nav-item:hover {
    color: var(--color-accent);
}
    </style>
</head>

<body>
<header class="main-header">
    <div class="logo">
        <h1>Kumul<span>Electronics</span></h1>
    </div>
   <nav class="nav-links">
    <a href="index.php" class="nav-item">Home</a>
    <a href="login.php" class="nav-item">Login</a>
    <a href="register.php" class="nav-item btn-auth">Register</a>
</nav>
</header>

<div class="login-container">
    <div class="login-card">

        <div class="brand-title">Kumul<span>Electronics</span></div>
        <h2>User Login</h2>

        <?php if ($error != ""): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>

            <button type="submit" name="login" class="btn-login">Login</button>
        </form>

        <div class="link">
            Don't have an account? <a href="register.php">Create one</a>
        </div>

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
