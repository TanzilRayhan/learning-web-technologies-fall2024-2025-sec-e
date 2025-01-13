<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Registration</title>
    <script>
        function validateForm() {
            const authorName = document.getElementById("author_name").value.trim();
            const contactNo = document.getElementById("contact_no").value.trim();
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (authorName === "") {
                alert("Author Name is required.");
                document.getElementById("author_name").focus();
                return false;
            }

            if (contactNo === "") {
                alert("Contact Number is required.");
                document.getElementById("contact_no").focus();
                return false;
            }

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

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                document.getElementById("password").focus();
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Author Registration</h1>
    <form action="../controller/authorCheck.php" method="POST" onsubmit="return validateForm()">
        <label for="author_name">Author Name:</label><br>
        <input type="text" id="author_name" name="author_name"><br><br>
        
        <label for="contact_no">Contact Number:</label><br>
        <input type="text" id="contact_no" name="contact_no"><br><br>
        
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
