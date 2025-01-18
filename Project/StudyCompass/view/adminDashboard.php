<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: ../view/login.php');
    exit();
}
require_once('../model/authModel.php');
require_once('../model/newsModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'fetchAdmins') {
        $admins = getAllAdmin();
        echo json_encode($admins ?: []);
        exit();
    } elseif ($action === 'fetchUsers') {
        $users = getAllUser();
        echo json_encode($users ?: []);
        exit();
    }
    exit();
}

$totalUsers = getTotalUsers();
$totalNews = getTotalNews();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <li><a href="../view/newsArticles.php">News & Articles</a></li>
                <li><a href="../controller/logout.php" id="btnLogin">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <hr>
            <nav>
                <ul>
                    <li><a href="../view/adminRegister.php">Admin Register</a></li>
                    <li><a href="#">Manage Universities</a></li>
                    <li><a href="#">Manage Scholarships</a></li>
                    <li><a href="#">Manage Events</a></li>
                    <li><a href="../view/newsAdmin.php">Manage Articles</a></li>
                    <li><a href="../controller/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <h1>Welcome, Admin</h1>
            <section class="overview">
                <div class="card">
                    <h3>Total Users</h3>
                    <p><?= number_format($totalUsers) ?></p>
                </div>
                <div class="card">
                    <h3>Active Universities</h3>
                    <p>300</p>
                </div>
                <div class="card">
                    <h3>Scholarships</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Articles</h3>
                    <p><?= number_format($totalNews) ?></p>
                </div>
            </section>
            <section class="user-management">
                <h2>Recent Admin Activity</h2>
                <table>
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="admin-table-body"></tbody>
                </table>
            </section>
            <section class="user-management">
                <h2>Recent User Activity</h2>
                <table>
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body"></tbody>
                </table>
            </section>
        </main>
    </div>
</body>

</html>