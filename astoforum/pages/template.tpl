<?php
session_start();
if (isset($_SESSION['user'])) {
    $current_profile = $_SESSION['user']['user_id'];
    $link = "../pages/profile.php?id=" . $current_profile;
    $name_link = "Мой профиль";
} else {
    $link = "../pages/authorization.php";
    $name_link = "Войти";
}
?>
<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&amp;display=swap'
          rel='stylesheet'>
    <link href='https://allfont.ru/allfont.css?fonts=a_avanteotl-heavy' rel='stylesheet' type='text/css'/>
    <link rel='stylesheet' href='../css/second-pages-style.css'>
    <link rel='stylesheet' href='../css/popup-style.css'>
    <link rel='stylesheet' href='../css/upload-file-style.css'>
    <title><?= $title ?></title>
</head>
<body>

<header>
    <div class='wrapper'>
        <div class='header-top-block'>
            <a class='logo' href='../index.php'>
                <img src='../img/icons/logo.png'>
            </a>
            <div class='header-menu'>
                <a href='../index.php'>Главная станица</a>
                <?= $link1 ?>
                <?= $link2 ?>
                <a href='<?= $link ?>'><?= $name_link ?></a>
            </div>
        </div>
        <div class='header-bottom-block'>
            <div class='page-title'>
                <?= $header ?>
            </div>

            <ul class='breadcrumbs'>
                <li><a href='../index.php'>Главная страница</a></li>
                <?= $breadcrumbs ?>
            </ul>
        </div>
    </div>
</header>

<main>
    <div class='wrapper'>
        <div class='main-block'>
            <?= $main_content ?>
        </div>
    </div>
</main>

<footer>
    <div class='wrapper'>
        <div class='footer-block'>
            <div class='footer-item'>
                <h2>Меню</h2>
                <a href='../index.php'>Главная страница</a>
                <a href='#'>Новости</a>
                <a href='#'>О нас</a>
                <a href='#'>Войти</a>
            </div>
            <div class='logo'>
                <img src='../img/icons/logo.png'>
            </div>
            <div class='footer-item'>
                <h2>Социальные сети</h2>
                <a class='social-item' href='https://vk.com'>
                    <div class='icon vk'></div>
                    <p>Vkontakte</p>
                </a>
                <a class='social-item' href='https://web.telegram.org/z/'>
                    <div class='icon telegram'></div>
                    <p>Telegram</p>
                </a>
                <a class='social-item' href='https://twitter.com/'>
                    <div class='icon twitter'></div>
                    <p>Twitter</p>
                </a>
                <a class='social-item' href='https://ru-ru.facebook.com/'>
                    <div class='icon facebook'></div>
                    <p>Facebook</p>
                </a>
            </div>
        </div>
    </div>
</footer>

<script src='../js/popup.js'></script>
<script src='../js/action_by_popup.js'></script>
<script src='../js/upload-file.js'></script>
</body>
</html>