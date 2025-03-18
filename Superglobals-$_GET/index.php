<?php
$articles = [
    [
        'title' => 'Eight Internet Giants Demand Restrictions on NSA Spying',
        'content' => 'Eight major technology companies, such as Google, Apple, and Facebook, have demanded changes in the way the government spies in an open letter to US President Barack Obama. They want to restore public trust in the internet. The companies, including Apple, Google, and Microsoft, are taking a joint stand...',
        'image' => 'img/image1.jpg'
    ],
    [
        'title' => 'Wild Benefactor Puts Money in Mailboxes',
        'content' => 'Residents of two apartment blocks in Koksijde were shocked to find money tucked into their mailboxes. A mysterious benefactor has been leaving large amounts of money for strangers, with no indication of who they are or why they are doing it. The residents of these buildings...',
        'image' => 'img/image2.jpg'
    ],
    [
        'title' => 'Original Hergé Pieces Auctioned for Hundreds of Thousands of Euros',
        'content' => 'Two original pieces by Hergé, the famous Belgian comic book artist, were auctioned for hundreds of thousands of euros. The auction, which took place in Brussels, featured iconic artwork from the "Tintin" series, including drawings of Tintin and Snowy. Fans and collectors from all over the world...',
        'image' => 'img/image3.jpg'
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Newspaper</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Today's Newspaper</h1>
        
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($articles[$_GET['id']])) {
            $article = $articles[$_GET['id']];
            echo "<div class='article-box'>";
            echo "<h2>" . $article['title'] . "</h2>";
            echo "<div class='image-box'><img src='" . $article['image'] . "' alt='Article Image'></div>";
            echo "<p>" . $article['content'] . "</p>";
            echo "<a href='index.php'>Back to overview</a>";
            echo "</div>";
        } else {
        ?>

        <div class="article-box">
            <h2>Eight Internet Giants Demand Restrictions on NSA Spying</h2>
            <div class="image-box">
                <img src="img/image1.jpg" alt="Mark Zuckerberg next to the Facebook logo">
            </div>
            <p>Eight major technology companies, such as Google, Apple, and Facebook, have demanded changes in the way the government spies in an open letter to US President Barack Obama. They want to restore public trust in the internet. The companies, including Apple, Google, and Microsoft, are taking a joint stand...</p>
            <a href="index.php?id=0">Read more</a>
        </div>

        <hr>

        <div class="article-box">
            <h2>Wild Benefactor Puts Money in Mailboxes</h2>
            <div class="image-box">
                <img src="img/image2.jpg" alt="The residence in Koksijde where the benefactor was working">
            </div>
            <p>Residents of two apartment blocks in Koksijde were shocked to find money tucked into their mailboxes. A mysterious benefactor has been leaving large amounts of money for strangers, with no indication of who they are or why they are doing it. The residents of these buildings...</p>
            <a href="index.php?id=1">Read more</a>
        </div>

        <hr>

        <div class="article-box">
            <h2>Original Hergé Pieces Auctioned for Hundreds of Thousands of Euros</h2>
            <div class="image-box">
                <img src="img/image3.jpg" alt="Tintin and Snowy">
            </div>
            <p>Two original pieces by Hergé, the famous Belgian comic book artist, were auctioned for hundreds of thousands of euros. The auction, which took place in Brussels, featured iconic artwork from the "Tintin" series, including drawings of Tintin and Snowy. Fans and collectors from all over the world...</p>
            <a href="index.php?id=2">Read more</a>
        </div>

        <form action="index.php" method="GET">
            <input type="text" name="search" placeholder="Search articles..." />
            <input type="submit" value="Search">
        </form>

        <?php } ?>
    </div>
</body>
</html>

