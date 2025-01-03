<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.php');
}

if (!isset($_COOKIE['status']) && !isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

$username = $_SESSION['username'];

require_once('../model/authModel.php');

$user = getUser($username);

if ($user === false) {
    echo "Error: User data not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
                <li><a href="../view/profile.php" id="btnReg">Profile</a></li>
            </ul>
        </div>
    </nav>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <hr>
            <nav>
                <ul>
                    <li><a href="#">Profile Information</a></li>
                    <li><a href="#">Bookmarks</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="#">Saved Universities</a></li>
                    <li><a href="#">Scholarships</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="../controller/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <h1>Welcome, <?= htmlspecialchars($user['username']); ?></h1>
            <section id="userWidget" class="profile-info">
                <h2>Profile Information</h2>
                <p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                <p><strong>Age:</strong> <?= htmlspecialchars($user['age']); ?></p>
                <p><strong>Date of Birth:</strong> <?= htmlspecialchars($user['dob']); ?></p>
               <a id="userButton" href="../controller/editUser.php?id=<?= $user['id'] ?>">Edit Profile</a>
            </section>

            <section id="userWidget" class="bookmarks">
                <h2>Bookmarks</h2>
                <ul>
                    <li>Harvard University</li>
                    <li>AI and Machine Learning Scholarship</li>
                    <li>10 Tips for Effective Study</li>
                </ul>
                <button id="userButton">Manage Bookmarks</button>
            </section>

            <section id="userWidget" class="notifications">
                <h2>Recent Notifications</h2>
                <ul>
                    <li>Application deadline for Stanford closes in 5 days</li>
                    <li>Your scholarship application has been approved</li>
                    <li>New article on Data Science available</li>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
