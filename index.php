<?php
// Start session and handle form submission
session_start();
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $licenseId = trim($_POST["license_id"]);
    $email = trim($_POST["email"]);
    $expiryDate = $_POST["expiry_date"];

    if (empty($licenseId) || empty($email) || empty($expiryDate)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Simulate renewal logic (e.g., database update or Azure API call)
        $success = "License ID <strong>$licenseId</strong> has been successfully renewed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VETHA License Renewal Portal</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: rgba(0,0,0,0.6);
            padding: 30px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #00ffff;
        }
        .banner {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 30px;
            background-color: #222;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #00ffff;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #00ffff;
            color: #000;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        .success {
            background-color: #28a745;
        }
        .error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to VETHA License Renewal Portal</h1>
        <div class="banner">Practice Session – Azure Administrator (AZ-104)</div>

        <form method="POST" action="">
            <label for="license_id">License ID:</label>
            <input type="text" name="license_id" id="license_id" required>

            <label for="email">Registered Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="expiry_date">Current Expiry Date:</label>
            <input type="date" name="expiry_date" id="expiry_date" required>

            <input type="submit" value="Renew License">
        </form>

        <?php if ($success): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php elseif ($error): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>