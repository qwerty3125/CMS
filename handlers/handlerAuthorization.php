<?php
    ini_set('session.gc_maxlifetime', 3600);
    session_start();
    $connect = new PDO('mysql:host=localhost; dbname=authorization_db', 'root', '');
    $login = $connect->query("SELECT login FROM Users");

    foreach($login as $log) {
        if($_POST['username'] === $log) {
            foreach($password as $pas) {
                if($_POST['password'] === $pas) {
                    $_SESSION['login'] = $_POST['username'];
                    header('Location: app/mainPage.php');
                }
            }
        } 
    }
?>