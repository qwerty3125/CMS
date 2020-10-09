<?
    $connect = new PDO('mysql:host=localhost; dbname=authorization_db', 'root', '');
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])){
        if($_POST['password'] === $_POST['confirm']) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = $connect->prepare("INSERT INTO Users SET `name` = :name, `email` =:email, `username` = :username, `password` = :password");
            $query->execute(array('name' => $name, 'email' => $email, 'username' => $username, 'password' => $password));
            header('Location: index.php');
            die();
        }
    }
    
    
    if($_POST) {
        header('Location: registration.php');
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
            <form class="" method="post" action="#">
                <div class="form-group">
                    <div class="title">Регистрация</div>
                </div>   
                <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Введите Ваше имя:</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name"/>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Ваша почта:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Введите логин:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Введите пароль:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Повторите пароль:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button id="buttonLogin" class="btn btn-primary btn-lg btn-block login-button">Создать учетную запись</button>
                </div>
                </form>
                <div class="form-group ">
                    <a href="index.php" class="btn btn-primary btn-lg btn-block login-button">Авторизоваться</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>