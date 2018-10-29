<?php include_once('header.php')?>


<div class="container">
    <h1>Register</h1>

    <form action="includes/register.php" method="POST"><br>
        <div class="form-group">
            <label for="content">Username</label> 
            <input class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
            <label for="content">Firstname</label> 
            <input class="form-control" type="text" name="firstname">
        </div>
        <div class="form-group">
            <label for="content">Lastname</label>
            <input class="form-control" type="text" name="lastname">
        </div>
        <div class="form-group">
            <label for="content">Password</label>
            <input class="form-control" type="password" name="pwd">
        </div>
        <div class="form-group">
            <label for="content">Email</label>
            <input class="form-control" type="text" name="email">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Sign up</button>
    </form>

</div>



<?php include_once('footer.php')?>