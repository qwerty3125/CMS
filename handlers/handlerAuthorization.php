<?php
    $connect = new PDO('mysql:host=localhost; dbname=authorization_db', 'root', '');
    $query = $connect->query("SELECT * FROM Users");
    
    if(!$_POST('username')) return "Пустой логин";
?>