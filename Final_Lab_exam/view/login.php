<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value.trim();
            var password = document.getElementById("password").value.trim();

            if (username === "") {
                alert("Username is required.");
                document.getElementById("username").focus();
                return false;
            }

            if (password === "") {
                alert("Password is required.");
                document.getElementById("password").focus();
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Admin Login</h1>
    <form action="../controller/loginCheck.php" method="POST" onsubmit="return validateForm()">
        <input type="text" id="username" name="username" placeholder="Username"><br><br>
        <input type="password" id="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <p>Don't have an account? <a href="../view/register.php">Register here</a></p>
</body>
</html>
