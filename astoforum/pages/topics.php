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
    <title>Статьи</title>
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
                <a href='about_us.php'>О нас</a>
                <a href='<?= $link ?>'><?= $name_link ?></a>
            </div>
        </div>
        <div class='header-bottom-block'>
            <div class='page-title'>
                <h1>Статьи</h1>
                <h2>Статьи</h2>
            </div>

            <ul class='breadcrumbs'>
                <li><a href='../index.php'>Главная страница</a></li>
                <li>Статьи</li>
            </ul>
        </div>
    </div>
</header>

<main>
    <div class='wrapper'>
        <div class='main-block'>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] === '1') : ?>
            <a href='#popup_add_topic' class='add-button popup-link'>
                <div class='button add'></div>
                <p>Добавить тему</p>
            </a>
            <?php endif; ?>
            <div class='topic-block'>

                <?php include '../includes/topic_list.php' ?>

            </div>
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
                <a href='about_us.php'>О нас</a>
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

<!---------------- POPUP ADD TOPIC ----------------->
<div id='popup_add_topic' class='popup'>
    <div class='popup-body'>
        <div class='popup-content popup-delete'>
            <a href='#' class='popup-close close-popup'></a>
            <form action='../includes/add_topic.php' method='post' enctype="multipart/form-data">
                <h2>Добавление темы</h2>
                <input class="input-form" name="topic_title" type="text"
                       value="" placeholder="Название темы" required><br>
                <div class='input__wrapper'>
                    <input name='topic_picture' type='file' id='input__file' class='input input-form-file'
                           accept='image/png, image/jpeg'>
                    <label for='input__file' class='input__file-button'>
                                    <span class='input__file-icon-wrapper'><img class='input__file-icon'
                                                                                src='../img/icons/add-file.png'
                                                                                alt='Выбрать файл' width='25'></span>
                        <span class='input__file-button-text'>Загрузите изображение темы</span>
                    </label>
                </div>
                <input class='button-form' name='add_topic' type='submit' value='Сохранить'>
            </form>
        </div>
    </div>
</div>

<!----------------- POPUP DELETE ----------------->

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] === '1') : ?>
    <div id="popup-delete-topic" class="popup">
        <div class="popup-body">
            <div class="popup-content popup-delete">
                <a href="#" class="popup-close close-popup"></a>
                <form action='../includes/delete_topic.php' class='popup-delete-to' method="post">
                    <h2>Вы уверены, что хотите удалить эту тему?</h2>
                    <p>Все статьи по этой теме будут удалены без возможности восстановления.</p>
                    <input class="button-form" name="delete_topic" type="submit" value="Да">
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<!----------------- POPUP UPDATE ----------------->

<?php if (isset($_SESSION['user'])) : ?>
    <div id="popup-update-topic" class="popup">
        <div class="popup-body">
            <div class="popup-content">
                <a href="#" class="popup-close close-popup"></a>
                <h2>Редактирование темы</h2>
                <form action='../includes/update_topic.php' method="post" class="popup-update-to" enctype="multipart/form-data">
                    <div class="authorization-form update-form">
                        <input class="input-form popup-update-to-title" name="title" type="text"
                               value="" placeholder="Название темы" required><br>

                        <input id="delete_picture" class="checkbox_input" name="delete_picture" type="checkbox"
                               value="">
                        <label for="delete_picture" class="checkbox_label">Удалить изображение темы</label><br>

                        <div class='input__wrapper'>
                            <input name='new_picture' type='file' id='input__file_2' class='input input-form-file'
                                   accept='image/png, image/jpeg'>
                            <label for='input__file_2' class='input__file-button'>
                                    <span class='input__file-icon-wrapper'><img class='input__file-icon'
                                                                                src='../img/icons/add-file.png'
                                                                                alt='Выбрать файл' width='25'></span>
                                <span class='input__file-button-text'>Загрузите изображение темы</span>
                            </label>
                        </div>
                        <input class="input-form" name="update-topic" type="submit" value="Обновить">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<!----------------- POPUPS MESSAGE --------------->

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

<?php if (isset($_SESSION['message_successful_add_topic'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['message_successful_add_topic']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message_successful_add_topic']); endif; ?>

<?php if (isset($_SESSION['message_delete_topic'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['message_delete_topic']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message_delete_topic']); endif; ?>


<script src='../js/popup.js'></script>
<script src='../js/action_by_popup.js'></script>
<script src='../js/upload-file.js'></script>
</body>
</html>