<?php
require_once 'functions.php';
$educationData = require_once('./data/eduction_data.php');
$profileData = require_once ('./data/profile_data.php');
$educations = getSortedArray($educationData['education']);
$experiences = getSortedArray($profileData['experience']);


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
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
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
            <h1 class="name"><?=$educationData['about']['name'];?></h1>
            <h3 class="tagline"><?=$educationData['about']['post'];?></h3>
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?=$educationData['about']['email'];?>"><?=$educationData['about']['email'];?></a></li>
                <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?=$educationData['about']['phone'];?>"><?=$educationData['about']['phone'];?></a></li>
                <li class="website"><i class="fa fa-globe"></i><a href="#" target="_blank"><?=$educationData['about']['site'];?></a></li>
                <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank"><?=$educationData['about']['social'];?></a></li>
            </ul>
        </div><!--//contact-container-->
        <div class="education-container container-block">
            <h2 class="container-block-title">ОБРАЗОВАНИЕ</h2>
            <?php foreach ($educations as $education){ ?>
            <div class="item">
                <h4 class="degree"><?=$education['speciality'];?></h4>
                <h5 class="meta"><?=$education['title'];?></h5>
                <div class="time"><?=$education['yearStart'];?> - <?=$education['yearEnd'];?></div>
            </div><!--//item-->
            <?php } ?>
        </div><!--//education-container-->

        <div class="languages-container container-block">
            <h2 class="container-block-title">ЯЗЫКИ</h2>
            <ul class="list-unstyled interests-list">
                <?php foreach ($educationData['languages'] as $languages): ?>
                <li><?=$languages['title'];?> <span class="lang-desc"><?=$languages['level'];?></span></li>
                <?php endforeach; ?>
            </ul>
        </div><!--//interests-->

        <div class="interests-container container-block">
            <h2 class="container-block-title">Интересы</h2>
            <ul class="list-unstyled interests-list">
                <?php foreach ($educationData['interest'] as $interests): ?>
                <li><?=$interests ?> </li>
                <?php endforeach; ?>
            </ul>
        </div><!--//interests-->

    </div><!--//sidebar-wrapper-->

    <div class="main-wrapper">

        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Обо мне</h2>
            <div class="summary">
                <p><?=$profileData['about']?></p>
            </div><!--//summary-->
        </section><!--//section-->

        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Опыт работы</h2>
            <?php foreach ($experiences as $experience): ?>
            <div class="item">
                <div class="meta">
                    <div class="upper-row">
                        <h3 class="job-title"><?=$experience['post']?></h3>
                        <div class="time"><?=$experience['yearStart']?> - <?=$experience['yearEnd']?:'По настоящее время'?></div>
                    </div><!--//upper-row-->
                    <div class="company"><?=$experience['company']?>, <?=$experience['city']?></div>
                </div><!--//meta-->
                <div class="details">
                    <p><?=$experience['about']?> </p>
                </div><!--//details-->
            </div><!--//item-->
            <?php endforeach; ?>


        </section><!--//section-->

        <section class="section projects-section">
            <h2 class="section-title"><i class="fa fa-archive"></i>Проекты</h2>
            <div class="intro">
                <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
            </div><!--//intro-->
            <?php foreach ($profileData['projects'] as $project): ?>
            <div class="item">
                <span class="project-title"><a href="<?=$project['link']?>"><?=$project['title']?></a></span> - <span class="project-tagline"><?=$project['about']?></span>
            </div>
                <?php endforeach; ?>

        </section><!--//section-->

        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
            <div class="skillset">
                <?php foreach ($profileData['skills'] as $skills): ?>
                <div class="item">
                    <h3 class="level-title"><?=$skills['title']?></h3>
                    <div class="level-bar">
                        <div class="level-bar-inner" data-level="<?=$skills['level']?>%">
                        </div>
                    </div><!--//level-bar-->
                </div><!--//item-->
                <?php endforeach; ?>
            </div>
        </section><!--//skills-section-->

    </div><!--//main-body-->
</div>


<!-- Javascript -->
<script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

