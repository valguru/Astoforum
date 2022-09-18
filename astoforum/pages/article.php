<?php
session_start();
$current_profile = $_SESSION['user']['user_id'];
if (isset($_SESSION['user'])) {
    $link = "../pages/profile.php?id=" . $current_profile;
    $name_link = "Мой профиль";
} else {
    $link = "../pages/authorization.php";
    $name_link = "Войти";
}
$article_id = '';
$article_title = '';
$topic_id = '';
$topic_title = '';


include '../includes/is_exist_article.php';

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
    <link rel="stylesheet" href="../css/popup-style.css">
    <title><?= $article_title ?></title>
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
                <h1></h1>
                <h2></h2>
            </div>

            <ul class='breadcrumbs'>
                <li><a href='../index.php'>Главная страница</a></li>
                <li><a href='topics.php'>Статьи</a></li>
                <?php if (isset($article_title) && $article_id !== ''): ?>
                    <li><a href='articles.php?id=<?= $topic_id ?>&topic=<?= $topic_title ?>'><?= $topic_title ?></a>
                    </li>
                    <li><?= $article_title ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>

<main>
    <div class='wrapper'>
        <div class='main-block'>
            <div class='article-block'>

                <?php if (isset($article_title) && $article_id !== ''): ?>

                <?php include '../includes/article_info.php' ?>

                <div class='comment-block'>
                    <h2>Комментарии</h2>
                    <?php if (isset($_SESSION['user'])): ?>
                        <form class='add-comment' method='post'
                              action="../includes/add_comment.php?id=<?= $article_id ?>&article=<?= $article_title ?>&topic_id=<?= $topic_id ?>&topic=<?= $topic_title ?>">
                            <textarea name="comment" class='input-form' placeholder='Введите комментарий'
                                      required></textarea>
                            <input class='input-form' name='add-comment' type='submit' value='Сохранить'>
                        </form>
                    <?php else: ?>
                        <p class="empty">Чтобы написать комментарий
                            <a class="empty empty-link" href="../pages/authorization.php">войдите</a> или
                            <a class="empty empty-link" href="../pages/registration.php">зарегистрируйтесь</a></p>
                    <?php endif; ?>

                    <?php include '../includes/comment_list.php' ?>

                    <?php else: ?>
                        <p class="empty">Такой страницы не существует</p>
                    <?php endif; ?>

                </div>
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
<!----------------- POPUPS MESSAGE --------------->
<?php if (isset($_SESSION['message_successful_add_comment'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['message_successful_add_comment']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message_successful_add_comment']); endif; ?>

<?php if (isset($_SESSION['message_delete_comment'])): ?>
    <div id="popup-message" class="popup open">
        <div class="popup-body">
            <div class="popup-content popup-message">
                <a href="#" class="popup-close close-popup"></a>
                <p><?= $_SESSION['message_delete_comment']; ?></p>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message_delete_comment']); endif; ?>

<!----------------- POPUP DELETE ----------------->

<?php if (isset($_SESSION['user'])) : ?>
    <div id="popup-delete-comment" class="popup">
        <div class="popup-body">
            <div class="popup-content popup-delete">
                <a href="#" class="popup-close close-popup"></a>
                <form action='../includes/delete_comment.php' class='popup-delete-to' method="post">
                    <h2></h2>
                    <p>Вы уверены, что хотите удалить комментарий?</p>
                    <input class="button-form" name="delete_comment" type="submit" value="Да">
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<!----------------- POPUP UPDATE ----------------->

<?php if (isset($_SESSION['user'])) : ?>
    <div id="popup-update-comment" class="popup">
        <div class="popup-body">
            <div class="popup-content">
                <a href="#" class="popup-close close-popup"></a>
                <h2>Редактирование комментария</h2>
                <form action='../includes/update_comment.php' method="post" class="popup-update-to"
                      enctype="multipart/form-data">
                    <div class="authorization-form update-form">
                        <textarea name="comment" class='input-form' placeholder='Введите комментарий'
                                  required></textarea>
                        <input class="input-form" name="update-topic" type="submit" value="Обновить">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<script src='../js/time-to-read.js'></script>
<script src="../js/popup.js"></script>
<script src="../js/action_by_popup.js"></script>
</body>
</html>