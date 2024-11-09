<?php
    include("../environ.php");

    $id = $_GET['id'];
    $pdo = new PDO($mysql_dsn, $mysql_dbname, $mysql_dbpassword);
    $sql = "delete from message where id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    header('location:' . $_SERVER['HTTP_REFERER']);  // 从哪来回哪去