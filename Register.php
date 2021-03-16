<?php 
    require_once 'Header.php';
?>

<h1>Register</h1>
<p>Already have Account? <a href="Login.php">Login</a></p>
<form action="Register-inc.php" method="POST"></form>

<input type="text" name="username" placeholder="User Name">
<input type="password" name="password" placeholder="Password">
<input type="password" name="confirmpassword" placeholder="Confirm Password">
<button type="submit" name="submit">Register</button>
<?php 
    require_once 'Footer.php';
?>