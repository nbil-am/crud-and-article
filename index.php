<?php
    include "database/conn.php";
    $sql = " SELECT * FROM article";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <?php
        session_start();
        if(isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<h1>user:$username</h1>";
            echo "<a href='dashboard.php'>dashboard</a>";
            echo "<a href='server/logout.php'>logout</a>";
        } else {
            echo "<div>
                <a href='login.php'>login</a>
                <a href='register.php'>register</a>
            </div>";
        }
        ?>
    </header>
    <main>
        <h1><center>POST</center></h1>
        <div class="card-container">
            <?php
                while($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    $description = $row["description"];
                    include "components/card.php";
                }
            ?>
        </div>
    </main>
</body>
</html>