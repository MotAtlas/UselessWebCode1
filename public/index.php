<html>
    <head>
        <title>test1</title>
    </head>
    <body>
        <h1>test1</h1>
        <p>Your new vhost is alive!</p>
        <?php
        session_start();
        if(isset($_SESSION['user']))
            var_dump( $_SESSION['user']);
        else
            //header("location: login.php");
        phpinfo();
        ?>
    </body>
</html>
