<?php
$text = file_get_contents('text-file.txt');

$textChars = str_split($text);

rsort($textChars);

$textChars = array_reverse($textChars);

$charCount = array_count_values($textChars);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Count</title>
</head>
<body>
    <h2>Character</h2>
    <p><strong>Total Different Characters:</strong> <?php echo count($charCount); ?></p>

    <h3>Character Frequency:</h3>
    <ul>
        <?php foreach ($charCount as $char => $count): ?>
            <li><?php echo "'$char' appears $count times"; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
