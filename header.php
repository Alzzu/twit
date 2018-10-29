<?php include_once('/includes/db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    <?php 
      if(isset($_SESSION['Logged'])) {
        echo '<a class="btn btn-outline-light" href="create-post.php">New post</a>';
        echo '<a class="btn btn-outline-light" href="profile.php?user='.$_SESSION['user_id'].'">'.$_SESSION['username'].'</a>';
        echo '<form action="includes/logout.php" method="POST">
              <button class="btn btn-danger" type="submit" name="submit">Logout</button>
              </form>';
      } else {
        echo '<form class="form-inline my-2 my-lg-0" action="includes/login.php" method="POST">
              <input class="form-control mr-sm-2" type="text" name="username" placeholder="Username" aria-label="Username">
              <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password" aria-label="Password">
              <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit">Login</button>
              </form>
              <a class="btn btn-light" href="register.php">Register</a>';
      }
    ?>
  </div>
</nav>