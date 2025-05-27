<?php
$db = new PDO('sqlite:back-end-users-exercise.db');

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR UNIQUE,
    password VARCHAR
)");

$db->exec("INSERT OR IGNORE INTO users (username, password) VALUES
    ('Jeff', 'IHatePasswords!'),
    ('Theresa', '_1k33pF0rg3tt1ng_'),
    ('Tam', 'Ayooooo@'),
    ('Tim', '!timtimtimtim')
");

echo "Database setup complete.";
?>
