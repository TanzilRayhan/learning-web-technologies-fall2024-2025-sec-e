<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.php');  
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
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="../view/home.php" id="btnReg">Profile</a></li>
            </ul>
        </div>
    </nav>
    <div class="dashboard-container">
        <nav class="sidebar">
            <h2>User Dashboard</h2>
            <ul>
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Saved Universities</a></li>
                <li><a href="#">Application Tracker</a></li>
                <li><a href="#">Budget Estimator</a></li>
                <li><a href="#">Exam Resources</a></li>
                <li><a href="#">Community Forum</a></li>
            </ul>
        </nav>

        <div class="main-content">
            <div class="top-nav">
                <a href="../view/home.php">Home</a>
                <a href="#">Scholarships</a>
                <a href="#">University Search</a>
                <a href="../controller/logout.php" class="logout">Logout</a>
            </div>

            <div class="dashboard-widgets">
                <div class="widget">
                    <h3>Saved Universities</h3>
                    <div class="checkbox"></div>
                </div>
                <div class="widget">
                    <h3>Application Deadlines</h3>
                    <div class="checkbox"></div>
                </div>
                <div class="widget">
                    <h3>Latest Scholarships</h3>
                    <div class="checkbox"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>