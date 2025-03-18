<!DOCTYPE html>
<?php
$correctUsername = 'sarah_parker';
$correctPassword = 'sarah123';
$feedback = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'] ?? '';
    $inputPassword = $_POST['password'] ?? '';

    if ($inputUsername === $correctUsername && $inputPassword === $correctPassword) {
        $feedback = 'Login successful! Welcome, ' . htmlspecialchars($inputUsername) . '.';
    } else {
        $feedback = 'Invalid username or password. Please try again.';
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        form { display: inline-block; text-align: left; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        label, input { display: block; margin-bottom: 10px; }
        button { cursor: pointer; padding: 10px 15px; }
        .feedback { margin-top: 15px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>User Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
    </form>
    <p class="feedback"><?php echo $feedback; ?></p>
</body>
</html>


