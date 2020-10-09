<?php
    ini_set('session.gc_maxlifetime', 3600);
    session_start();
    $connect = new PDO('mysql:host=localhost; dbname=authorization_db', 'root', '');
    $users = $connect->query("SELECT * FROM Users");
    setcookie('err', 0, time() + 3600/55);
    if($_POST['login']) {
        foreach($users as $user) {
            if($_POST['login'] == $user['login']) {
                if($_POST['password'] == $user['password']) {
                    $_SESSION['login'] = $_POST['login'];
                    header('Location: mainpage.php');
                } else {
                    setcookie('err', 1, time() + 3600/55);
                }
            } else {
                setcookie('err', 1, time() + 3600/55);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <script src="js/AJAX.js"></script>
    <div class="wrapper">
        <div class="container h-100 main">
            <div class="row main-form">
                <form method="POST" action="handlers/handlerAuthorization.php">
                    <div class="form-group">
                        <div class="title">Авторизация</div>
                    </div>    

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Логин:</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="login" id="login" placeholder="Enter your Login"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Пароль:</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="error">
                        <?
                            if($_COOKIE['err'] > 0){
                                echo "Ошибка с логином или паролем";
                            }
                        ?>
                        </div>
                    </div> 

                    <div class="form-group ">
                        <button type="button" id="buttonLogin" class="btn btn-primary btn-lg btn-block login-button">Войти</button>
                    </div>
                </form>
                <div class="form-group ">
                    <button type="button" id="buttonReg" class="btn btn-primary btn-lg btn-block login-button">Зарегистрироваться</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>