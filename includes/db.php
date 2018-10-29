<?php
$dbServername = "localhost";
$dbUsername = "twit";
$dbPassword = "foHEcO28cOP4";
$dbName = "twit";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

function getUsers() {
    global $conn;

    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        return mysqli_fetch_assoc($result);
    }
}

function getAllPosts() {
    global $conn;
    $array = array();

    $sql = "SELECT * FROM posts ORDER BY created DESC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $user = getUser($row["user_id"]);

            array_push($array, '<div class="post"><h2 class="post-title">'.$row["title"].'</h2><a class="author" href="profile.php?user='.$user['id'].'">'.$user['username'].'</a><p class="post-content">'. $row["content"].'</p></div>');
        }
        return $array;
    }

}

function getUserPosts($user_id) {
    global $conn;
    $array = array();

    $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created DESC;");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($array, '<div class="post"><p class="post-content">'. $row["content"].'</p></div>');
        }
        return $array;
    }
}

function getUser($user_id) {
    global $conn;
    $array = array();

    $stmt = $conn->prepare("SELECT id, username, firstname, lastname, email, img FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $result;
}