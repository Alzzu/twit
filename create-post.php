<?php 
include_once('header.php');
if(!isset($_SESSION['Logged'])) {
    header("Location: index.php");
    exit();
}
?>
<div class="container">
    <form action="includes/create-post.php" method="POST">
        <div class="form-group">
            <label for="content">Content</label> 
            <textarea class="form-control" name="content" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Post</button>
    </form>
</div>


<?php include_once('footer.php') ?>