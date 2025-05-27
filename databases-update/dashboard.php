<?php
$db = new PDO('sqlite:back-end-users-exercise.db');
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $id = (int)$_POST['update_id'];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username && $password) {
        $stmt = $db->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->execute([$username, $password, $id]);
        $message = "User updated successfully.";
    } else {
        $message = "Username and password cannot be empty.";
    }
}

$users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Dashboard</h2>

<?php if ($message): ?>
    <p style="color:green;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<h3>User overview</h3>
<table border="1" cellpadding="6">
    <tr>
        <th>id</th><th>username</th><th>password</th><th>action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <form method="post">
            <td><?= $user['id'] ?></td>
            <td>
                <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>">
            </td>
            <td>
                <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>">
            </td>
            <td>
                <input type="hidden" name="update_id" value="<?= $user['id'] ?>">
                <button type="submit">update</button>
            </td>
        </form>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
