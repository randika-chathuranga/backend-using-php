<?php 
    require_once 'Header.php';
?>

<h1>Log in</h1>
<p>No Account? <a href="Register.php">Register Here</a></p>
<form action="Login-inc.php" method="POST">
<input type="text" name="username" placeholder="User Name">
<input type="password" name="password" placeholder="Password">
<button type="submit" name="submit">Login</button>
</form>
<?php 
    require_once 'Footer.php';
?>