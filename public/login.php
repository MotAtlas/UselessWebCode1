<form action="login_backend.php" method="post">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <span><?php if(isset($_GET['error_msg'])) echo $_GET['error_msg'];?></span>
    <input type="submit" value="Submit">
</form>