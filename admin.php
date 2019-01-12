<?php
session_start();
if(!$_SESSION['login']){
    header("Location:login.php");
    die();
}
if($_POST['unlogin']){
    session_destroy();
    header("Location:login.php");
}
if(count($_POST)>0){
    header("Location:admin.php");
}
//if($_SESSION['login'] == "moderator"){

//}
$connexion = new PDO ('mysql:host=localhost; dbname=academy; charset =utf8', 'root', '');
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$data = $connexion->query("SELECT * FROM `comments` WHERE moderate='new'");
?>
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
<body>
<h1>Админ панель</h1>
<p><?php echo "Привет, ". $_SESSION['login'] ?></p>
<form action="" method="post">
    <?php foreach ($data as $comment) {?>
    <label for="<?=$comment['id'] ?>"><?=$comment['name']." - ". $comment['comment'] ?></label>
    <select name="<?=$comment['id'] ?>" id="<?=$comment['id'] ?>">
        <?php if($_SESSION['rank']==100){
            echo "<option value='ok'>принять</option><option value='reject'>отклонить</option>";
        }else{
            echo "<option value='reject'>отклонить</option>";
        } ?>
        <!--<option value="ok">принять</option>
        //<option value="reject">отклонить</option>-->
    </select> <br>
    <?php } ?>
    <button>Модерировать</button>
</form>
<form action="" method="post">
    <input type="submit" name="unlogin" value="Выйти из админ">
</form>
</body>
<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
foreach ($_POST as $num=>$result){
    if($result == "ok" /*&& $_SESSION['rank']==100*/){
        $connexion->query("UPDATE `comments` SET moderate='ok' WHERE id=$num");
    }else{
        $connexion->query("UPDATE `comments` SET moderate='reject' WHERE id=$num");
    }
}