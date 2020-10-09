<?php
    ini_set('session.gc_maxlifetime', 3600);
    session_start();
    $connect = new PDO('mysql:host=localhost; dbname=authorization_db', 'root', '');
    $users = $connect->query("SELECT * FROM Users");
    setcookie('error', 0, time() + 3600/55);
    if($_POST['login']) {
        foreach($users as $user) {
            if($_POST['login'] == $user['login']) {
                if($_POST['password'] == $user['password']) {
                    $_SESSION['login'] = $_POST['login'];
                    header('Location: mainpage.php');
                } else {
                    setcookie('error', 2, time() + 3600/55);
                }
            } else {
                setcookie('error', 1, time() + 3600/55);
            }
        }
    }
?>