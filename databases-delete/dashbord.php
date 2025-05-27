<?php
$db = new PDO('sqlite:back-end-users-exercise.db');
$message = "";

if (isset($_GET['delete_confirmed'])) {
    $id = (int)$_GET['delete_confirmed'];
    $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $message = "User deleted.";
}

$users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Dashboard</h2>

<?php if (isset($_GET['confirm'])): ?>
    <?php
        $id = (int)$_GET['confirm'];
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php if ($user): ?>
        <p style="color:red;">You are about to delete "<?=htmlspecialchars($user['username'])?>" (id: <?= $user['id'] ?>). Are you sure?</p>
        <form method="get" style="display:inline;">
            <input type="hidden" name="delete_confirmed" value="<?= $user['id'] ?>">
            <button type="submit">delete</button>
        </form>
        <form method="get" style="display:inline;">
            <button type="submit">cancel</button>
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
<?php endif; ?>

<?php if ($message): ?>
    <p style="color:green;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>
<h3>User overview</h3>
<table border="1" cellpadding="6">
    <tr>
        <th>id</th><th>username</th><th>password</th><th>action</th>
    </tr>
    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['username']) ?></td>
        <td><?= htmlspecialchars($u['password']) ?></td>
        <td><a href="?confirm=<?= $u['id'] ?>">[x]</a></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>