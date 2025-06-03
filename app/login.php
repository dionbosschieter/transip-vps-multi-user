<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'demo' && $password === 'demo') {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = 'admin';
        header('Location: dashboard.php');
        exit;
    } elseif ($username === 'dev' && $password === 'dev') {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = 'dev';
        header('Location: dashboard.php');
        exit;
    } elseif ($username == 'finance' && $password == 'finance') {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = 'finance';
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid login credentials';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h1 class="text-center mb-4">Login</h1>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
</body>
</html>
