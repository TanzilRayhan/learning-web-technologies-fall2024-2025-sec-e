<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: ../view/login.php');
    exit();
}

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
    <title>Admin - Manage Articles</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body class="news-admin">
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">StudyCompass</a></li>
                <li><a href="../view/home.php">Home</a></li>
                <li><a href="#">Scholarships</a></li>
                <li><a href="#">Visa Updates</a></li>
                <li><a href="#">Rankings</a></li>
                <li><a href="../view/newsArticles.php">News & Articles</a></li>
                <li><a href="../view/adminDashboard.php" id="btnReg">Dashboard</a></li>
            </ul>
        </div>
    </nav>
    <div class="news-container">
        <header class="news-header">
            <h1>Admin Dashboard - Manage News</h1>
            <nav class="news-nav">
                <a href="../view/newsArticles.php">View Articles</a>
                <a href="../view/addNews.php">Create Articles</a>
            </nav>
        </header>

        <main class="news-main">
            <section class="news-articles">
                <?php foreach ($articles as $article) { ?>
                    <article class="news-article">
                        <h2><?= $article['title']; ?></h2>
                        <button class="news-btn"><?= $article['category']; ?></button>
                        <p><?= $article['content']; ?></p>
                        <a href="../controller/editNews.php?id=<?= $article['id'] ?>"><button class="news-btn">Edit</button></a>
                        <a href="../controller/deleteNews.php?id=<?= $article['id']?>"><button class="news-btn delete">Delete</button></a>
                    </article>
                    <?php } ?>
            </section>
        </main>
    </div>
</body>

</html>