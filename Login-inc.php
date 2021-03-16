<?php 
    if(isset($_POST['submit'])){ 
        require 'Database.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
        header("Location:Home.php?error=emptyfields");
        exit();  
        } else{
            $sql= "SELECT * FROM users WHERE username = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location:Home.php?error=sqlerror");
                exit(); 
            }else{
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){
                    $passCkeck = password_verify($password, $row['password']);
                        if($passCkeck == false){
                            header("Location:Home.php?error=wrongpass");
                            exit();
                        } elseif($passCkeck == true){
                            session_start();
                            $_SESSION['sessionId'] = $row['id'];
                            $_SESSION['sessionUser'] = $row['username'];
                            header("Location:Home.php?error=loggedin");
                            exit(); 
                        }else{
                            header("Location:Home.php?error=wrongpass");
                            exit(); 
                        }
                }else{
                header("Location:Home.php?error=nouser");
                exit();
                }
            }
        }

    }else{
        header("Location:Home.php?error=accessforbidden");
        exit();
    }
?>