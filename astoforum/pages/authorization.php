<?php
session_start();
$email = "";
$password = "";
if(isset($_COOKIE['email'])) $email = $_COOKIE['email'];
if(isset($_COOKIE['password'])) $password = $_COOKIE['password'];
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
    <link rel='stylesheet' href='../css/upload-file-style.css'>
    <link rel='stylesheet' href='../css/popup-style.css'>
    <title>Вход</title>
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
                <a href='news.php'>Новости</a>
                <a href='topics.php'>Статьи</a>
                <a href='about_us.php'>О нас</a>
            </div>
        </div>
        <div class='header-bottom-block'>
            <div class='page-title'>
                <h1>Вход</h1>
                <h2>Вход</h2>
            </div>

            <ul class='breadcrumbs'>
                <li><a href='../index.php'>Главная страница</a></li>
                <li>Вход</li>
            </ul>
        </div>
    </div>
</header>

<main>
    <div class='wrapper'>
        <div class='main-block'>
            <form action='../includes/signin.php' method='post'>
                <div class='authorization-form'>
                    <input class='input-form' name='email' type='email' placeholder='Email' value='<?= $email ?>' required><br>
                    <input class='input-form' name='password' type='password'
                           placeholder='Пароль' value='<?= $password ?>' required><br>
                    <input class='input-form' name='sign_in' type='submit' value='Войти'><br>
                    <a href='#'>Забыли пароль?</a>
                    <a href='registration.php'>Регистрация</a>
                </div>
            </form>
        </div>
    </div>
</main>

<footer>
    <div class='wrapper'>
        <div class='footer-block'>
            <div class='footer-item'>
                <h2>Меню</h2>
                <a href='../index.php'>Главная страница</a>
                <a href='news.php'>Новости</a>
                <a href='topics.php'>Статьи</a>
                <a href='about_us.php'>О нас</a>
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

<?php if (isset($_SESSION['error_authorization'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['error_authorization']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['error_authorization']); endif; ?>

<?php if (isset($_SESSION['message_successful_signup'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['message_successful_signup']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message_successful_signup']); endif; ?>

<script src='../js/popup.js'></script>
</body>
</html>