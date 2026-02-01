<?php
session_start();
// Hardcoded credentials for the demo
$correct_email = "admin@test.com";
$correct_password = "password123";

$error = "";

if (isset($_POST['login'])) {
    if ($_POST['email'] == $correct_email && $_POST['password'] == $correct_password) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php"); // Redirect to Exam
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Online Exam</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 10px; shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Student Login</h2>
        <?php if($error) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email (admin@test.com)" required>
            <input type="password" name="password" placeholder="Password (password123)" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
