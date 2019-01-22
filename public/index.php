<html>
    <head>
        <title>test1</title>
    </head>
    <body>
        <h1>test1</h1>
        <?php
        session_start();
        if(isset($_SESSION['user'])){
            echo "You are logged in, ". $_SESSION['user'];
        }
        else
            header("location: login.php");
        ?>
    </body>
</html>
