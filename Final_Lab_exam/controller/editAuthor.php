<?php
require_once('../model/db.php');
$conn = getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM authors WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $author = mysqli_fetch_assoc($result);

    if (!$author) {
        echo "Author not found!";
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $author_name = trim($_POST['author_name']);
    $contact_no = trim($_POST['contact_no']);
    $username = trim($_POST['username']);

    if (empty($author_name) || empty($contact_no) || empty($username)) {
        echo "All fields are required!";
    } else {
        $updateSql = "UPDATE authors SET author_name = '$author_name', contact_no = '$contact_no', username = '$username' WHERE id = $id";
        if (mysqli_query($conn, $updateSql)) {
            header('Location: ../view/adminDashboard.php');
            exit();
        } else {
            echo "Failed to update author.";
        }
    }
}
?>

<h2>Edit Author</h2>
<form action="editAuthor.php" method="POST">
    <input type="hidden" name="id" value="<?= $author['id'] ?>">
    <input type="text" name="author_name" value="<?= $author['author_name'] ?>" placeholder="Author Name"><br>
    <input type="text" name="contact_no" value="<?= $author['contact_no'] ?>" placeholder="Contact No"><br>
    <input type="text" name="username" value="<?= $author['username'] ?>" placeholder="Username"><br>
    <button type="submit" name="update">Update Author</button>
</form>
