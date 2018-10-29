<?php
include_once('header.php');
    

$stmt = $conn->prepare("SELECT id, username, firstname, lastname, email, img FROM users WHERE id = ? LIMIT 1");
$stmt->bind_param('s', $_GET['user']);
$stmt->execute();
$result = mysqli_fetch_assoc($stmt->get_result());
$stmt->close();

?>

<div class="container">
    <div class="row">
        <div class="profile-info col-md-3">
            <img class="profile-image" src="<?php echo $result['img'] ?>" alt="">
            <span class="profile-fullname"><?php echo $result['firstname'] . " " . $result['lastname'] ?></span>
            <span class="profile-username"><?php echo "@" . $result['username'] ?></span>
            <span class="profile-email"><img src="svg/envelope-closed.svg"><?php echo " " . $result['email'] ?></span>
        </div>
        

        <div class="col-md-9 personal-posts">
            <h3>Personal posts</h3>
            <?php
            $posts = getUserPosts($result['id']);
            if(sizeof($posts) > 0) {
                foreach($posts as $post) {
                    echo $post;
                }
            } else {
                echo 'No posts';
            }
            ?>
        </div>
    </div>
</div>

<?php include_once('footer.php') ?>

