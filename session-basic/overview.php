<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['street'])) {
    header('Location: registration.php');
    exit;
}

function editLink($field) {
    $page = in_array($field, ['email', 'nickname']) ? 'registration.php' : 'address.php';
    return "$page?focus=$field";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Overview Page</title>
</head>
<body>
    <h2>Overview Page</h2>

    <p>Email: <?= htmlspecialchars($_SESSION['email']) ?> | <a href="<?= editLink('email') ?>">Edit</a></p>
    <p>Nickname: <?= htmlspecialchars($_SESSION['nickname']) ?> | <a href="<?= editLink('nickname') ?>">Edit</a></p>
    <p>Street: <?= htmlspecialchars($_SESSION['street']) ?> | <a href="<?= editLink('street') ?>">Edit</a></p>
    <p>Number: <?= htmlspecialchars($_SESSION['number']) ?> | <a href="<?= editLink('number') ?>">Edit</a></p>
    <p>City: <?= htmlspecialchars($_SESSION['city']) ?> | <a href="<?= editLink('city') ?>">Edit</a></p>
    <p>Zipcode: <?= htmlspecialchars($_SESSION['zipcode']) ?> | <a href="<?= editLink('zipcode') ?>">Edit</a></p>

    <p><a href="registration.php?destroy=1" style="color:red;">Destroy session (Clear all data)</a></p>
</body>
</html>
