<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (!$_SESSION['isAdmin']) {
    header("Location: chatroom.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Delete User Form</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand">Navigation</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="chatroom.php">Home <span class="sr-only">(current)</span></a>
                    <?php
                        if($_SESSION['isAdmin']) {
                    ?>
                    <a class="nav-item nav-link" href="addUser.php">Add User</a>
                    <a class="nav-item nav-link active" href="deleteUser.php">Delete User</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <form class="form-inline my-2 my-lg-0" action="phpCalls/logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="logout">Logout</button>
            </form>
        </nav>
        
        <h1 id="deleteUserTitle">Delete User</h1>
        
        <fieldset>
            <form>
                Username: <input type="text" name="username" id="username" placeholder="Enter username" required /> <br>
            </form>
            <input type="submit" id="remove" value="Remove User"/>
        </fieldset>
        
        <script>
            $('#remove').click(function() {
                $.ajax({
                    type: "POST",
                    url: "phpCalls/delete.php",
                    data: {"username": $('#username').val()},
                    success: function(data) {
                        alert("User successfully removed");
                    }
                    
                });
            });
        </script>
    </body>
</html>