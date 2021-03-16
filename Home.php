<?php 
    require_once 'Header.php';
?>

<?php 
if(isset($_SESSION['sessionId'])){
    echo "you are logged in!";
}else{
    echo "Home";
}

?>

<?php 
    require_once 'Footer.php';
?>