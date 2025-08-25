<?php
include "../database/conn.php";
$article_id = $_GET["id"];
$sql = "DELETE FROM article WHERE id='$article_id'";
$conn->query($sql);
// echo "$article_id";
header("Location:../dashboard.php");