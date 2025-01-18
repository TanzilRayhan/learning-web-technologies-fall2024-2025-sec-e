<?php
session_start();


require_once('../model/newsModel.php');
$totalNews = getTotalNews();

$articles = getAllNews();

if ($articles === false) {
    echo "Error: User data not found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News and Articles</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">StudyCompass</a></li>
                <li><a href="../view/home.php">Home</a></li>
                <li><a href="#">Scholarships</a></li>
                <li><a href="#">Visa Updates</a></li>
                <li><a href="#">Rankings</a></li>
                </ul>
        </div>
    </nav>
    <header class="news-header">
        <h1>News and Articles</h1>
    </header>
    <div class="news-container">
        <main class="news-main">
            <section class="news-articles">
                <?php foreach ($articles as $article) { ?>
                    <article class="news-article">
                        <h2><?= $article['title']; ?></h2>
                        <button class="news-btn"><?= $article['category']; ?></button>
                        <p><?= $article['content']; ?></p>
                    </article>
                    <?php } ?>
            </section>
        </main>
    </div>
</body>

</html>