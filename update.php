<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["title"])&&empty($_POST["description"])) {
            header("Location:dashboard.php");
            exit;
        }
        $title = $_POST["title"];
        $description = $_POST["description"];
        $id = $_POST["id"];

        include "database/conn.php";
        $sql = "UPDATE article set title='$title', description='$description' where id='$id'";
        $conn->query($sql);
        header("Location:dashboard.php");
        exit;
    }
session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["email"]) && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $title = $_GET["title"];
        $description = $_GET["description"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="title" value="<?=$title?>" required>
        <label for="description">description</label>
        <input type="text" name="description" id="description" value="<?=$description?>" required>
        <input type="text" name="id" id="" hidden value="<?=$id?>">
        <button type="submit">Submit</button>
    </form>
</body>
</html>