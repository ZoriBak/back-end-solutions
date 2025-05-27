<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['email'] = $_POST['email'] ?? '';
    $_SESSION['nickname'] = $_POST['nickname'] ?? '';
    header('Location: address.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Registration Details</title>
</head>
<body>
    <h2>Part 1: Registration Details</h2>
    <form method="post" action="registration.php">
        <label>
            Email<br>
            <input
                type="email" name="email" required
                value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>"
                <?= $focus === 'email' ? 'autofocus' : '' ?>
            >
        </label><br><br>

        <label>
            Nickname<br>
            <input
                type="text" name="nickname" required
                value="<?= htmlspecialchars($_SESSION['nickname'] ?? '') ?>"
                <?= $focus === 'nickname' ? 'autofocus' : '' ?>
            >
        </label><br><br>

        <button type="submit">Next</button>
    </form>
</body>
</html>
