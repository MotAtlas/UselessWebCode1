<form action="register_backend.php" method="post">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" placeholder="Enter Password" name="password" required>
    <input type="password" placeholder="Repeat Password" name="password-repeat" required>
    <span><?php if(isset($_GET['error_msg'])) echo $_GET['error_msg'];?></span>
    <input type="submit" value="Submit">
</form>