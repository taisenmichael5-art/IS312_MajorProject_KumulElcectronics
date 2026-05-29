<?php
include 'db_connect.php';

$message = "";
$messageType = ""; // success or error

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (Username, Fname, Lname, Email, Password)
            VALUES ('$username','$fname','$lname','$email','$password')";

    if (mysqli_query($conn, $sql)) {
        $message = "Registration Successful! You can now login.";
        $messageType = "success";
    } else {
        $message = "Registration Failed. Try again.";
        $messageType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kumul Electronics</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/2.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-card {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            width: 400px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        .brand-title {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .brand-title span {
            color: #007bff;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .register-card input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .register-card input:focus {
            border-color: #007bff;
            outline: none;
        }

        .full-width {
            grid-column: span 2;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: #1e7e34;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .message {
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
        }
		.main-footer {
    background: #1e2a38;
    color: #bdc3c7;
    padding: 50px 6% 20px;
    margin-top: 80px;
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
    font-size: 14px;
    margin-bottom: 15px;
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
    <a href="index.php" class="nav-item">Home</a>
    <a href="login.php" class="nav-item">Login</a>
    <a href="register.php" class="nav-item btn-auth">Register</a>
</nav>
</header>

<div class="register-container">
    <div class="register-card">

        <div class="brand-title">Kumul<span>Electronics</span></div>
        <h2>Create Account</h2>

        <?php if ($message != ""): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <div class="form-grid">
                <input type="text" name="username" placeholder="Username" required class="full-width">

                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>

                <input type="email" name="email" placeholder="Email Address" required class="full-width">

                <input type="password" name="password" placeholder="Password" required class="full-width">
            </div>

            <button type="submit" name="register" class="btn-register">Register</button>

        </form>

        <div class="link">
            Already have an account? <a href="login.php">Login here</a>
        </div>

    </div>
</div>
<footer>
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

</footer>
</body>
</html>
