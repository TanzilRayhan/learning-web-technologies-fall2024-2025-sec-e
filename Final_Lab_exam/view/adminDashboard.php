<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: ../view/login.php');
    exit();
}

require_once('../model/db.php');
$conn = getConnection();

if (isset($_GET['query'])) {
    header('Content-Type: application/json');

    $query = trim($_GET['query']);
    $searchSql = "SELECT * FROM authors WHERE author_name LIKE '%$query%'";
    $result = mysqli_query($conn, $searchSql);

    $authors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $authors[] = $row;
    }

    echo json_encode($authors); 
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM authors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script>
        function searchAuthors() {
            const query = document.getElementById("searchInput").value.trim();
            const searchResults = document.getElementById("search-results");

            if (query === "") {
                alert("Please enter a search term.");
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("GET", "../view/adminDashboard.php?query=" + (query), true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const authors = JSON.parse(xhr.responseText);
                    showResults(authors);
                }
            };

            xhr.send();
        }

        function showResults(authors) {
            const searchResults = document.getElementById("search-results");
            searchResults.innerHTML = "";

            if (authors.length === 0) {
                searchResults.innerHTML = "<p>No authors found matching the search term.</p>";
                return;
            }

            const table = document.createElement("table");
            table.border = "1";
            table.cellSpacing = "0";
            table.cellPadding = "5";

            const headerRow = document.createElement("tr");
            headerRow.innerHTML = `
                <th>ID</th>
                <th>Author Name</th>
                <th>Contact No</th>
                <th>Username</th>
            `;
            table.appendChild(headerRow);

            authors.forEach(author => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${author.id}</td>
                    <td>${author.author_name}</td>
                    <td>${author.contact_no}</td>
                    <td>${author.username}</td>
                `;
                table.appendChild(row);
            });

            searchResults.appendChild(table);
        }
    </script>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <a href="../view/login.php">Login</a> | <a href="../controller/logout.php">Logout</a> <br>
    <p>Welcome, <?= $_SESSION['admin_username']; ?>!</p>

    <h3>Search Authors</h3>
    <input type="text" id="searchInput" placeholder="Search by name">
    <button type="button" onclick="searchAuthors()">Search</button><br><br>
    <div id="search-results"></div>

    <h3>Authors List</h3>
    <a href="../view/createAuthor.php">Add New Author</a> <br><br>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Author Name</th>
            <th>Contact No</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['author_name'] ?></td>
                <td><?= $row['contact_no'] ?></td>
                <td><?= $row['username'] ?></td>
                <td>
                    <a href="../controller/editAuthor.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="../controller/deleteAuthor.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('Are you sure you want to delete this author?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
