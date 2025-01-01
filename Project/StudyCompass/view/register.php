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
            <h2>Register</h2>
            <hr>
            <form>
                <div class="row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="reg-username">Username</label>
                        <input type="text" name="reg-username" required>
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" name="reg-password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" required>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
            <div class="switch">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </div>
</body>
</html>