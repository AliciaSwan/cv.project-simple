<?php
require_once 'functions.php';
//$educationData = require_once('./data/eduction_data.php');
//$profileData = require_once ('./data/profile_data.php');
//$educations = getSortedArray($educationData['education']);
//$experiences = getSortedArray($profileData['experience']);

$connexion = new PDO ('mysql:host=localhost; dbname=academy; charset =utf8', 'root', '');
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo var_dump($connexion);
$profile = $connexion->query('SELECT*FROM `profile`');
$profile = $profile->fetchAll();
$education = $connexion->query('SELECT*FROM `education` ORDER BY yearEnd DESC');
$experience = $connexion->query('SELECT*FROM `experience` ORDER BY yearEnd DESC');
$languages = $connexion->query('SELECT*FROM `languages`');
$skills = $connexion->query('SELECT*FROM `skills`');
$interests=$connexion->query('SELECT*FROM `interests`');
$projects=$connexion->query('SELECT*FROM `projects`');

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Responsive Resume/CV of Angelika Popova</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
            <img class="profile" src="assets/images/profile.png" alt="" />
<!--            <h1 class="name">--><?//=$profile[0]['name'];?><!--</h1>-->
<!--            <h3 class="tagline">--><?//=$profile[0]['post'];?><!--</h3>-->
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?=$profile['0']['email'];?>"><?=$profile['0']['email'];?></a></li>
                <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?=$profile['0']['phone'];?>"><?=$profile['0']['phone'];?></a></li>
                <li class="website"><i class="fa fa-globe"></i><a href="#" target="_blank"><?=$profile['0']['site'];?></a></li>
                <li class="vk"><i class="fa fa-vk"></i><a href="https://vk.com/id614451" target="_blank"><?=$profile['0']['social'];?></a></li>
            </ul>
        </div><!--//contact-container-->
        <div class="education-container container-block">
            <h2 class="container-block-title">ОБРАЗОВАНИЕ</h2>
            <?php foreach ($education as $step){ ?>
            <div class="item">
                <h4 class="degree"><?=$step['speciality'];?></h4>
                <h5 class="meta"><?=$step['title'];?></h5>
                <div class="time"><?=$step['yearStart'];?> - <?=$step['yearEnd'];?></div>
            </div><!--//item-->
            <?php } ?>
        </div><!--//education-container-->

        <div class="languages-container container-block">
            <h2 class="container-block-title">ЯЗЫКИ</h2>
            <ul class="list-unstyled interests-list">
                <?php foreach ($languages as $lang): ?>
                <li><?=$lang['title'];?> <span class="lang-desc"><?=$lang['level'];?></span></li>
                <?php endforeach; ?>
            </ul>
        </div><!--//interests-->

        <div class="interests-container container-block">
            <h2 class="container-block-title">Интересы</h2>
            <ul class="list-unstyled interests-list">
                <?php foreach ($interests as $interest): ?>
                <li><?=$interest['title'] ?> </li>
                <?php endforeach; ?>
            </ul>
        </div><!--//interests-->

    </div><!--//sidebar-wrapper-->

    <div class="main-wrapper">

        <section class="section name-section">
            <h1 class="name"><?=$profile[0]['name'];?></h1>
            <hr/>
            <h3><?=$profile[0]['post'];?></h3>
            <div class="summary">

            </div><!--//summary-->
        </section><!--//section-->

        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Обо мне</h2>
            <div class="summary">
                <p>Web дизайнер, web разработчик. <br/> Креативный подход к решению проблем вашего бизнеса.<br/>
                    В вэб разработке с 2009 года.
                    Разработаю для Вас современный, удобный сайт, который привлечет новых клиентов.
                    Владею основами оптимизации и продвижения сайтов в Google. Что позволит Вам существенно съэконимить на этапе разработки сайта.

                     </p>
            </div><!--//summary-->
        </section><!--//section-->

        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Опыт работы</h2>
            <?php foreach ($experience as $experiences): ?>
            <div class="item">
                <div class="meta">
                    <div class="upper-row">
                        <h3 class="job-title"><?=$experiences['post']?></h3>
                        <div class="time"><?=$experiences['yearStart']?> - <?=$experiences['yearEnd']?:'По настоящее время'?></div>
                    </div><!--//upper-row-->
                    <div class="company"><?=$experiences['company']?>, <?=$experiences['city']?></div>
                </div><!--//meta-->
                <div class="details">
                    <p><?=$experiences['about']?> </p>
                </div><!--//details-->
            </div><!--//item-->
            <?php endforeach; ?>


        </section><!--//section-->

        <section class="section projects-section">
            <h2 class="section-title"><i class="fa fa-archive"></i>Проекты</h2>
            <div class="intro">
                <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
            </div><!--//intro-->
            <?php foreach ($projects as $project): ?>
            <div class="item">
                <span class="project-title"><a href="<?=$project['link']?>"><?=$project['title']?></a></span> - <span class="project-tagline"><?=$project['about']?></span>
            </div>
                <?php endforeach; ?>

        </section><!--//section-->

        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
            <div class="skillset">
                <?php foreach ($skills as $skill): ?>
                <div class="item">
                    <h3 class="level-title"><?=$skill['title']?></h3>
                    <div class="level-bar">
                        <div class="level-bar-inner" data-level="<?=$skill['level']?>%">
                        </div>
                    </div><!--//level-bar-->
                </div><!--//item-->
                <?php endforeach; ?>
            </div>
        </section><!--//skills-section-->

    </div><!--//main-body-->
</div>

<div class="wrapper">
    <div class="main-wrapper">
        <div class="forme-avis">
            <h3>Оставить отзыв</h3>
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Имя">
                <textarea name="comment"  cols="20"  placeholder="Отзыв"></textarea>
                <button>Оставить отзыв</button>
                <br/>

                <?php if(isset($_POST['name'])&& isset($_POST['comment'])) {
                    $comment = $_POST['comment'];
                    $name = $_POST['name'];
                    if(strpos($_POST['comment'] || $_POST['name'],'редиска')===false){
                        echo "<span style='color:red;'>* редиска не может быть записана в базу данных</span>";
                    }else {
                        $connexion->query("INSERT INTO comments (`name`,`comment`,`date`)VALUES ('$name','$comment', now())");
                        $n = 0;
                    }
                }
                $avis = $connexion->query('SELECT*FROM `comments`');
                    ?>
            </form>
            <hr>
            <div class="avis">
                <h3>Отзывы</h3>
                <?php foreach ($avis as $avi){
                    $n++;    ?>
                <ul>
                    <li class="list-unstyled">#<?=$n ?>.<span class="name-avis"> <?=$avi['name']?></span></li>
                    <li class="list-unstyled date-avis"><?=$avi['date'] ?></li>
                    <li class="list-unstyled">"<?=$avi['comment'] ?>"</li>
                </ul>
                <hr>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<!-- Javascript -->
<script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

