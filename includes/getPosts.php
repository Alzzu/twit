<?php
if(isset($_POST['getData'])) {

    include_once('db.php');

    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['limit']);

    $sql = $conn->query("SELECT * FROM posts ORDER BY created DESC LIMIT $start, $limit");
    if($sql->num_rows > 0) {
        $response = "";

        while($data = $sql->fetch_array()) {
            $user = getUser($data["user_id"]);

            $response .= '
                <div class="post">
                    <div class="post-user-info">
                        <img class="post-user-image" src="'.$user['img'].'"></img>
                        <span class="post-author-fullname">'.$user['firstname']. " " . $user['lastname'] .'</span><br>
                        <a class="post-author-username" href="profile.php?user='.$data['user_id'].'">@'. $user['username'] .'</a>
                    </div>
                    <p class="post-content">'.$data["content"].'</p>
                </div>
            ';
        }

        exit($response);
    } else {
        exit('reachedMax');
    }
} else {
    exit();
}
