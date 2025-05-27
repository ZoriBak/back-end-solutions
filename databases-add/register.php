<?php
$db = new PDO('sqlite:back-end-users-exercise.db');

$message = "";
$username = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '') {
        $errors[] = "Username is required.";
    } else {
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $errors[] = "Username already exists.";
        }
    }

    if ($password === '') {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    } elseif (!preg_match('/[!?\@_]/', $password)) {
        $errors[] = "Password must contain one of these: ! ? @ _";
    }

    if (empty($errors)) {
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        $message = "User registered successfully!";
        $username = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<h2>Register</h2>

<?php if ($message): ?>
    <p style="color:green;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<?php if ($errors): ?>
    <p style="color:red;">Your username or password are invalid:</p>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST">
    Username:<br>
    <input type="text" name="username" value="<?= htmlspecialchars($username) ?>"><br><br>
    Password:<br>
    <input type="password" name="password"><br><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>
