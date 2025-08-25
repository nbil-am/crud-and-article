<?php 
session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["email"])) {
        header("Location:index.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include("database/conn.php");
        $password = $_POST["password"];
        $username = $_POST["username"];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo $result->num_rows;
            $row = $result->fetch_assoc();
            $uuid = $row["uuid"];
            if(password_verify($password, $row["password"])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["uuid"] = $uuid;
            // echo"$uuid";
            header("Location:index.php");
        } else {
            echo "salah password";
        }}
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
    <h1><center>Login center</center></h1>
    <div>
        <form action="login.php" method="post">
            <label for="username">username</label>
            <input type="text" id="username" name="username" required>
        <label for="pasword">password</label>
        <input type="password" id="password" name="password" required>
        <button>Submit</button>
    </form>
    <p> Don't have an account? <a href="register.php">Create now</a></p>
</div>

</body>
</html>