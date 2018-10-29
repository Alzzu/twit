<?php
session_start();

if (isset($_POST['submit'])) {
    include_once 'db.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));
    $user_id = 0;
    $user_email = "";

    if(empty($username) || empty($pwd)) {

    } else {
        $stmt = $conn->prepare("SELECT id, username, email, pwd FROM users WHERE username = ? AND pwd = ? LIMIT 1");
        $stmt->bind_param("ss", $username, $pwd);
        $stmt->execute();
        $stmt->bind_result($user_id, $username, $user_email, $password);
        $stmt->store_result();
        if($stmt->num_rows == 1) {
            if($stmt->fetch()) {
                $_SESSION['Logged'] = 1;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                header("Location: ../index.php?login=success");
                exit();
            }
        } else {
            echo 'perkele';
            exit();
        }
    }
} else {    
    header("Location: ../index.php");
    exit();
}
