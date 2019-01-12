<?php
session_start();
$connexion = new PDO ('mysql:host=localhost; dbname=academy; charset =utf8', 'root', '');
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$login = $connexion->query("SELECT * FROM `admin` ");

if($_POST){
    foreach ($login as $log){
        if($_POST['login']==$log['login'] && $_POST['password']==$log['password']){
            $_SESSION['login']=$_POST['login'];
            $_SESSION['password']=$_POST['password'];
            $_SESSION['rank']=$log['rank'];
            header("Location: admin.php");
        }

    }
    echo "Неверный логин или пароль";
}
?>
<body>
<link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
<h1>Вход в админ панель</h1>
<form action="" method="post">
    <input type="text" name="login" placeholder="Логин"><br>
    <input type="password" name="password" placeholder="Пароль"><br>
    <input type="submit" value="Войти">
</form>
</body>
