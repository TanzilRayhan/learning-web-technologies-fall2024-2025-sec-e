<?php
session_start();
require_once('../model/newsModel.php');

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

if (!$id) {
    echo "News ID is missing!";
    exit();
}

$con = getConnection();
$sql = "SELECT * FROM news_articles WHERE id='{$id}'";
$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "News not found!";
    exit();
}

$news = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">StudyCompass</a></li>
                <li><a href="../view/home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Scholarships</a></li>
                <li><a href="#">Visa Updates</a></li>
                <li><a href="#">Rankings</a></li>
                <li><a href="../view/userDashboard.php" id="btnReg">Dashboard</a></li>
            </ul>
        </div>
    </nav>
    <div class="addArticles-container">
        <header class="addArticles-header">
            <h1>Add New Article</h1>
        </header>
        <main class="addArticles-main">
            <form method="post" action="../controller/updateNews.php" class="addArticles-form">
                <input type="hidden" name="id" value="<?= $news['id'] ?>">

                <div class="addArticles-group">
                    <label for="title">Article Title</label>
                    <input type="text" id="title" name="title" value="<?= $news['title'] ?>">
                </div>

                <div class="addArticles-group">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option name="category" value="Scholarships" <?= ($news['category'] == 'Scholarship') ? 'selected' : '' ?>>Scholarships</option>
                        <option name="category" value="Visa Updates" <?= ($news['category'] == 'Visa Updates') ? 'selected' : '' ?>>Visa Updates</option>
                        <option name="category" value="University Rankings" <?= ($news['category'] == 'University Rankings') ? 'selected' : '' ?>>University Rankings</option>
                        <option name="category" value="Tips and Stories" <?= ($news['category'] == 'Tips and Stories') ? 'selected' : '' ?>>Tips and Stories</option>
                    </select>
                </div>

                <div class="addArticles-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows=" 8" ><?= $news['content'] ?></textarea>
                </div>

                <div class="addArticles-buttons">
                    <button name="submit" type="submit" class="addArticles-btn">Update</button>
                    <button type="reset" class="addArticles-btn reset">Reset</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>