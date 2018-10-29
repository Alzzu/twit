<?php
session_start();

if(isset($_POST['submit']) && isset($_SESSION['Logged'])) {
    include_once('db.php');

    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    if(empty($content)) {


    } else {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $content);
        $stmt->execute();
        header("Location: ../index.php?post=success");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}