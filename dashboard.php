<?php 
include("database/conn.php");
session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["email"]) || !isset($_SESSION["uuid"]) ) {
        header("Location:index.php");
    }
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $uuid = $_SESSION["uuid"];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $sql = "INSERT INTO article (user_id,title,description) VALUES('$uuid','$title','$description')";
        $conn->query($sql);
    }
    $sql = "SELECT * FROM article WHERE user_id='$uuid'";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="user_data">
        <p>username:<?=$username?></p>
        <p>email:<?=$email?></p>
    </div>
    <form action="dashboard.php" class="form border" method="post">
        <label for="title">title</label>
        <input type="text" id="title" name="title" required>
        <label for="description">description</label>
        <input type="text" id="description" name="description" required>
        <button type="submit">Submit</button>
    </form>
    <div class="card-container">
        <?php 
            while($row = $result->fetch_assoc()) {
                $title= $row["title"];
                $description= $row["description"];
                $id= $row["id"];
                include("components/card.php");
            }
        ?>
    </div>
</body>
</html>