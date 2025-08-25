<?php 
session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["email"])) {
        header("Location:index.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include "database/conn.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $verify_password = $_POST["verify_password"]; 
        $email = $_POST["email"];
        if(empty($username) || empty($password) || empty($verify_password) || empty($email)) {
            exit;
    }
        if($password !== $verify_password) {
        exit;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username,email,password) values('$username','$email','$password')";
    $conn->query($sql);
    // $_SESSION["username"] = $username;
    // $_SESSION["email"] = $email;
    // $_SESSION["uuid"] = $uuid;
    header("Location:login.php");
    echo "aman kan?";
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
    <h1><center>Create a account</center></h1>
     <div>
        <form action="register.php" method="post">
            <label for="username">username</label>
            <input type="text" id="username" name="username" required>
            <label for="email">email</label>
            <input type="text" id="email" name="email" required>
            <label for="pasword">password</label>
            <input type="password" id="password" name="password" required>
            <label for="verify_pasword">verify password</label>
            <input type="password" id="verify_password" name="verify_password" required>
            <button type="submit">Submit</button>
    </form>
    <p>have an account? <a href="login.php">Login now</a></p>
</div>
</body>
</html>