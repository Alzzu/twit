<?php

if(isset($_POST['submit'])) {
    include_once 'db.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $first = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['lastname']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        header("Location: ../register.php?error=usertaken");
        exit();
    } else {
        $hashedPwd = md5($password);
        $stmt = $conn->prepare("INSERT INTO users (username, firstname, lastname, email, pwd) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $first, $last, $email, $hashedPwd);
        $stmt->execute();
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}



