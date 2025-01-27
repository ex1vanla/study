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
    echo 'session uset';

    $_SESSION = [];

    if(isset($_COOKIE['PHPSESSID'])){
        setcookie('PHPISSEID','',time() - 1800, '/');
    }

    session_destroy();

    echo 'session';
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

    echo 'cookie';
    echo '<pre>';
    var_dump($_COOKIE);
    echo '</pre>';

    ?>
</body>
</html>