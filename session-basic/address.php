<?php
session_start();
if (isset($_GET['destroy'])) {
    session_destroy();
    header('Location: registration.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['street'] = $_POST['street'] ?? '';
    $_SESSION['number'] = $_POST['number'] ?? '';
    $_SESSION['city'] = $_POST['city'] ?? '';
    $_SESSION['zipcode'] = $_POST['zipcode'] ?? '';
    header('Location: overview.php');
    exit;
}
$focus = $_GET['focus'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Address</title>
</head>
<body>
    <h2>Registration Details</h2>
    <p>Email: <?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>
    <p>Nickname: <?= htmlspecialchars($_SESSION['nickname'] ?? '') ?></p>

    <h2>Part 2: Address</h2>
    <form method="post" action="address.php">
        <label>
            Street<br>
            <input
                type="text" name="street" required
                value="<?= htmlspecialchars($_SESSION['street'] ?? '') ?>"
                <?= $focus === 'street' ? 'autofocus' : '' ?>
            >
        </label><br><br>

        <label>
            Number<br>
            <input
                type="text" name="number" required
                value="<?= htmlspecialchars($_SESSION['number'] ?? '') ?>"
                <?= $focus === 'number' ? 'autofocus' : '' ?>
            >
        </label><br><br>

        <label>
            City<br>
            <input
                type="text" name="city" required
                value="<?= htmlspecialchars($_SESSION['city'] ?? '') ?>"
                <?= $focus === 'city' ? 'autofocus' : '' ?>
            >
        </label><br><br>

        <label>
            Zipcode<br>
            <input
                type="text" name="zipcode" required
                value="<?= htmlspecialchars($_SESSION['zipcode'] ?? '') ?>"
                <?= $focus === 'zipcode' ? 'autofocus' : '' ?>
            >
        </label><br><br>

        <button type="submit">Next</button>
    </form>

    <p><a href="?destroy=1" style="color:red;">Destroy session (Clear all data)</a></p>
</body>
</html>
