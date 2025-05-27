<?php
try {
    $db = new PDO('sqlite:pages/exercises/databases/spotify.sqlite');
} catch (PDOException $e) {
    die("Could not connect: " . $e->getMessage());
}

function h($str) {
    return htmlspecialchars($str);
}

$totalTracks = $db->query("SELECT COUNT(*) FROM tracks")->fetchColumn();

$stmt = $db->prepare("SELECT name FROM tracks WHERE name LIKE ?");
$stmt->execute(['%you%']);
$tracksWithYou = $stmt->fetchAll(PDO::FETCH_COLUMN);

$stmt = $db->prepare("SELECT name FROM tracks WHERE LOWER(name) LIKE '%you%' AND LOWER(name) LIKE '%i%'");
$stmt->execute();
$tracksYouAndI = $stmt->fetchAll(PDO::FETCH_COLUMN);

$query = "
    SELECT t.name AS track_name, a.name AS album_name, ar.name AS artist_name
    FROM tracks t
    JOIN albums a ON t.album_id = a.id
    JOIN artists ar ON t.artist_id = ar.id
    WHERE LOWER(t.name) LIKE '%you%'
      AND LOWER(t.name) LIKE '%i%'
      AND (LOWER(a.name) LIKE '%vol%' OR LOWER(a.name) LIKE '%chron%')
";
$filteredTracks = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

$artists = array_unique(array_map(fn($t) => $t['artist_name'], $filteredTracks));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Spotify AI Chatbot</title>
</head>
<body>
    <h2>You wake up after a deep sleep...</h2>
    <p>You can't feel your body. You see only 0s and 1s.</p>
    <p><strong>You:</strong> Hello! Can you help me out? I need some information...</p>

    <p><strong>AI:</strong> 10100 00 1? W01r0 0m 1? Wh0r0 a0 I? Where am I?</p>
    <p><strong>AI:</strong> Ehh, I don't know man. I just woke up and I don't feel too well.</p>

    <p><strong>User:</strong> I'm looking for a song...</p>

    <p><strong>AI:</strong> Ok... I'll need some more information than that. I can see <strong><?= $totalTracks ?></strong> songs here...</p>

    <p><strong>User:</strong> Well, it goes something like wom, wom, wom, drumroll, takka, takka</p>
    <p><strong>AI:</strong> Ok, not really helping. Do you have a lyric?</p>

    <p><strong>User:</strong> It's a guy screaming "eh eh eh eh eh youuuuu"</p>

    <p><strong>AI:</strong> I see <strong><?= count($tracksWithYou) ?></strong> songs containing the word 'you'. Do you want me to repeat them?</p>
    <ul>
        <?php foreach ($tracksWithYou as $track): ?>
            <li><?= h($track) ?></li>
        <?php endforeach; ?>
    </ul>

    <p><strong>User:</strong> I think the dude also starts with 'I' and 'you' in the title.</p>

    <p><strong>AI:</strong> Ok, here are tracks with 'you' and 'i' in the title:</p>
    <ul>
        <?php foreach ($tracksYouAndI as $track): ?>
            <li><?= h($track) ?></li>
        <?php endforeach; ?>
    </ul>

    <p><strong>User:</strong> The album had 'vol' or 'chron' in the title.</p>

    <p><strong>AI:</strong> Found <strong><?= count($filteredTracks) ?></strong> tracks with 'you' and 'i' on albums containing 'vol' or 'chron':</p>
    <ul>
        <?php foreach ($filteredTracks as $row): ?>
            <li><?= h($row['track_name']) ?> — Album: <?= h($row['album_name']) ?> — Artist: <?= h($row['artist_name']) ?></li>
        <?php endforeach; ?>
    </ul>

    <p><strong>User:</strong> Can you just list the artists?</p>
    <ul>
        <?php foreach ($artists as $artist): ?>
            <li><?= h($artist) ?></li>
        <?php endforeach; ?>
    </ul>

    <p><strong>User:</strong> It was "I Put a Spell On You" by CCR!</p>
    <p><strong>AI:</strong> No worries. Anything else?</p>
</body>
</html>

