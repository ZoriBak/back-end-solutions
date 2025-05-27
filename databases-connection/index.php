<?php
$dbFile = __DIR__ . '/pages/exercises/databases/spotify.sqlite';

try {
    $db = new PDO("sqlite:$dbFile");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmtCols = $db->query("PRAGMA table_info(customers)");
    $customerColumns = [];
    while ($row = $stmtCols->fetch(PDO::FETCH_ASSOC)) {
        $customerColumns[] = $row['name'];
    }

    
    $table = $_GET['table'] ?? '';
    $table = trim($table);
    $searchResult = null;

    if ($table !== '') {
       
        if (preg_match('/^\w+$/', $table)) {
            $stmtSearch = $db->query("PRAGMA table_info($table)");
            $columns = $stmtSearch->fetchAll(PDO::FETCH_ASSOC);
            if (count($columns) > 0) {
                $searchResult = array_column($columns, 'name');
            } else {
                $searchResult = [];
            }
        } else {
            $searchResult = [];
        }
    }
} catch (PDOException $e) {
    die("DB error: " . htmlspecialchars($e->getMessage()));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Spotify SQLite Viewer</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    ul { margin-left: 20px; }
    #search-results { margin-top: 20px; }
  </style>
</head>
<body>

  <h1>Spotify SQLite Viewer</h1>

  <h2>List the columns of a specific table</h2>
  <form method="get" action="">
    <input type="text" name="table" placeholder="Enter table name" value="<?php echo htmlspecialchars($table); ?>" />
    <button type="submit">Search</button>
  </form>

  <?php if ($table !== ''): ?>
    <div id="search-results">
      <?php if (is_array($searchResult) && count($searchResult) > 0): ?>
        <h3>Result:</h3>
        <ul>
          <?php foreach ($searchResult as $col): ?>
            <li><?php echo htmlspecialchars($col); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p>There are no results</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <h2>Artist name</h2>
  <ul>
    <?php foreach ($artists as $artist): ?>
      <li><?php echo htmlspecialchars($artist); ?></li>
    <?php endforeach; ?>
  </ul>

  <h2>Customer table columns:</h2>
  <ul>
    <?php foreach ($customerColumns as $col): ?>
      <li><?php echo htmlspecialchars($col); ?></li>
    <?php endforeach; ?>
  </ul>

</body>
</html>
