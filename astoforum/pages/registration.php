<?php
session_start();
$last_name = "";
$first_name = "";
$gender = "";
$age = "";
$about_user = "";
$phone = "";
$email = "";
$password = "";

if (isset($_COOKIE['last_name'])) $last_name = $_COOKIE['last_name'];
if (isset($_COOKIE['first_name'])) $first_name = $_COOKIE['first_name'];
if (isset($_COOKIE['gender'])) $gender = $_COOKIE['gender'];
if (isset($_COOKIE['age'])) $age = $_COOKIE['age'];
if (isset($_COOKIE['phone'])) $phone = $_COOKIE['phone'];
if (isset($_COOKIE['email'])) $email = $_COOKIE['email'];
if (isset($_COOKIE['password'])) $password = $_COOKIE['password'];
if (isset($_COOKIE['about_user'])) $about_user = $_COOKIE['about_user'];
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
    <title>Регистрация</title>
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
                <a href='#'>Новости</a>
                <a href='#'>Статьи</a>
                <a href='#'>О нас</a>
            </div>
        </div>
        <div class='header-bottom-block'>
            <div class='page-title'>
                <h1>Регистрация</h1>
                <h2>Регистрация</h2>
            </div>
            <ul class='breadcrumbs'>
                <li><a href='../index.php'>Главная страница</a></li>
                <li>Регистрация</li>
            </ul>
        </div>
    </div>
</header>

<main>
    <div class='wrapper'>
        <div class='main-block'>
            <form action='../includes/signup.php' method='post' enctype='multipart/form-data'>
                <div class='authorization-form'>
                    <input class='input-form' name='last_name' type='text' value='<?= $last_name ?>'
                           placeholder='Фамилия' required><br>
                    <input class='input-form' name='first_name' type='text' value='<?= $first_name ?>' placeholder='Имя'
                           required><br>

                    <div class='radio-item'>
                        <input class='input-radio' name='gender' type='radio' value='1' id='male'
                               checked <?php if ($gender == 1) echo 'checked'; ?>>
                        <label class='label-radio' for='male'>Мужчина</label>
                    </div>
                    <div class='radio-item'>
                        <input class='input-radio' name='gender' type='radio' value='2'
                               id='female' <?php if ($gender == 2) echo 'checked'; ?>>
                        <label class='label-radio' for='female'>Женщина</label>
                    </div>
                    <input class='input-form' name='age' type='number' min='0' onkeypress='return event.charCode >= 48' value='<?= $age ?>' placeholder='Возраст'>

                    <div class='input__wrapper'>
                        <input name='avatar' type='file' id='input__file' class='input input-form-file'>
                        <label for='input__file' class='input__file-button'>
                            <span class='input__file-icon-wrapper'><img class='input__file-icon'
                                                                        src='../img/icons/add-file.png' alt='Выбрать файл'
                                                                        width='25'></span>
                            <span class='input__file-button-text'>Загрузите аватар</span>
                        </label>
                    </div>

                    <input class='input-form' name='phone' type='number' value='<?= $phone ?>'
                           onkeypress='return event.charCode >= 48' placeholder='Мобильный телефон'
                           required><br>
                    <input class='input-form' name='email' type='email' value='<?= $email ?>' placeholder='Email'
                           required><br>
                    <textarea class='input-form' name='about_user' placeholder='Информация о себе'
                              maxlength="5000" ><?= $about_user ?></textarea><br>
                    <input class='input-form' name='password' type='password' value='<?= $password ?>'
                           placeholder='Пароль' required><br>
                    <input class='input-form' name='password_confirm' type='password' value=''
                           placeholder='Повторите пароль' required><br>
                    <input class='input-form' name='sign_up' type='submit' value='Зарегистрироваться'><br>
                    <a href='authorization.php'>Уже зарегистрированы?</a>
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
                <a href='#'>Новости</a>
                <a href='#'>Статьи</a>
                <a href='#'>О нас</a>
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

<?php if (isset($_SESSION['wrong_password_confirm'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['wrong_password_confirm']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['wrong_password_confirm']); endif; ?>

<?php if (isset($_SESSION['wrong_avatar_extension'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['wrong_avatar_extension']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['wrong_avatar_extension']); endif; ?>

<?php if (isset($_SESSION['error_upload_avatar'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['error_upload_avatar']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['error_upload_avatar']); endif; ?>

<?php if (isset($_SESSION['error_double_login'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['error_double_login']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['error_double_login']); endif; ?>

<script src='../js/upload-file.js'></script>
<script src='../js/popup.js'></script>
</body>
</html>