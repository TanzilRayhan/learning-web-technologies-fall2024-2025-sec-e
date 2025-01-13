<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value.trim();
            var password = document.getElementById("password").value.trim();

            if (username === "") {
                alert("Username is required.");
                document.getElementById("username").focus();
                return false;
            }

            var passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{6,}$/;
            if (!passwordPattern.test(password)) {
                alert("Password must be at least 6 characters long, contain at least one number, and one special symbol.");
                document.getElementById("password").focus();
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Admin Register</h1>
    <form action="../controller/registerCheck.php" method="POST" onsubmit="return validateForm()">
        <input type="text" id="username" name="username" placeholder="Username"><br><br>
        <input type="password" id="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
