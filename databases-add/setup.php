<?php

$db = new PDO('sqlite:back-end-users-exercise.db');
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR UNIQUE,
    password VARCHAR
)");

$db->exec("INSERT OR IGNORE INTO users (username, password) VALUES
    ('alice', 'password123!'),
    ('bob', 'bobpass@123'),
    ('charlie', 'charlie_pw?')
");

echo "Database setup complete.";
?>

