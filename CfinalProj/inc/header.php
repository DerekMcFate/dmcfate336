<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Monterey Area Weather</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <style>
          @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" href="https://csumb.edu">CSUMB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Weather<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="login.php">Login</a>
                    
                    <?php
                        if($_SESSION['admin'] == 'admin'){
                           echo "<a class='nav-item nav-link' href='admin.php'>Admin</a>";
                           echo "<a class='nav-item nav-link' href='logout.php'>Logout</a>";
                        }
                    ?>
                </div>
            </div>
        </nav>