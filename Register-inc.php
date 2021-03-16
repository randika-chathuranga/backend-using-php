<?php 
    if(isset($_POST['submit'])){
        // add database connection
        require 'Database.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if(empty($username) || empty($password) || empty($confirmpassword)){
            header("Location:Register.php?error=emptyfields&username=".$username);
            exit();
        }elseif(!preg_match("/^[a-zA-Z0-9]*/",$username)){
            header("Location:Register.php?error=invalidusername&username=".$username);
            exit();
        }elseif($password !== $confirmpassword){
            header("Location:Register.php?error=passworddonotmatch&username=".$username);
            exit();
        }
        else{
            $sql = "SELECT username FROM users WHERE username = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location:Register.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if($rowCount>0){
                    header("Location:Register.php?error=usernametaken");
                    exit();
                }else{
                $sql = "INSERT INTO users(username,password) VALUES(? , ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:Register.php?error=sqlerror");
                    exit();
                }else{

                    $hashedPass = password_hash($password,PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"ss",$username,$hashedPass);
                    mysqli_stmt_execute($stmt);
                    header("Location:Register.php?succes=registered");
                    exit();
                }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?> 