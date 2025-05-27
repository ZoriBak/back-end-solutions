<?php
session_start();

$credentialsContent = trim(file_get_contents('credentials.txt'));
list($savedUsername, $savedPassword) = explode(',', $credentialsContent);

$error = '';
$username = '';
$remember = false;

if (isset($_GET['logout'])) {
    setcookie('logged_in', '', time() - 3600);
    session_destroy();
    header('Location: index.php');
    exit;
}

if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] === 'yes') {
  
    $username = $savedUsername;
    $loggedIn = true;
} else {
    $loggedIn = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if ($username === $savedUsername && $password === $savedPassword) {
    
        $loggedIn = true;
        $_SESSION['username'] = $username;

        if ($remember) {
        
            setcookie('logged_in', 'yes', time() + 30 * 24 * 60 * 60);
        } else {
            setcookie('logged_in', 'yes', 0);
        }

        header('Location: index.php');
        exit;
    } else {
        $error = 'Username and/or password incorrect. Try again.';
        $loggedIn = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
</head>
<body>

<?php if ($loggedIn): ?>
    <h2>Dashboard</h2>
    <p>Hello <?= htmlspecialchars($username) ?>, glad to have you back!</p>
    <p><a href="?logout=1">Logout</a></p>

<?php else: ?>
    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>
            Username<br>
            <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required>
        </label><br><br>

        <label>
            Password<br>
            <input type="password" name="password" required>
        </label><br><br>

        <label>
            <input type="checkbox" name="remember" <?= $remember ? 'checked' : '' ?>>
            Remember me
        </label><br><br>

        <button type="submit">Login</button>
    </form>
<?php endif; ?>

</body>
</html>
