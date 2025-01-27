<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_SESSION['visited'])){
        echo "First time";

        $_SESSION['visited'] = 1;
        $_SESSION['date'] = date('c');
    }
    else{
        $visited  = $_SESSION['visited'];
        $visited++;
        $_SESSION['visited'] = $visited;
        echo $_SESSION['visited'] . 'times <br>' ;

        if(isset($_SESSION['date'])){
            echo 'last time is' . $_SESSION['date'];
            $_SESSION['date'] = date('c');
        }
    }
    ?>
</body>
</html>