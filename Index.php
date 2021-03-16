<!--

<?php 
    require_once 'Database.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);
        $rowCount = mysqli_num_rows($result);
    
        if ($rowCount > 0) {
            while($row = mysqli_fetch_assoc($result)){
                echo $row['username']." ".$row['password']."<br>";
            }
        } else{
            echo "no result found";
        }
    
    
    ?>
</body>
</html>


    -->