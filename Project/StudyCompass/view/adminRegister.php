<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - StudyCompass</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">StudyCompass</a></li>
            </ul>
        </div>
    </nav>
    <div class="form">
        <div class="form-container register-container">
            <h2>Admin Register</h2>
            <hr>
            <form method="post" action="../controller/createAdmin.php">
                <div class="row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="reg-username">Username</label>
                        <input type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <button name="submit" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>