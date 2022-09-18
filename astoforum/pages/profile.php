<?php
session_start();
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
    <link rel='stylesheet' href='../css/list.css'>
    <title>Личный кабинет</title>
</head>

<?php if (isset($_SESSION['user'])): ?>
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
                    <?php if (isset($_GET['id']) && $_GET['id'] === $_SESSION['user']['user_id']): ?>
                        <h1>Личный кабинет</h1>
                        <h2>Личный кабинет</h2>
                    <?php endif; ?>
                </div>

                <ul class='breadcrumbs'>
                    <li><a href='../index.php'>Главная страница</a></li>
                    <?php if (isset($_GET['id']) && $_GET['id'] === $_SESSION['user']['user_id']): ?>
                        <li>Личный кабинет</li>
                    <?php else: ?>
                        <li>Страница пользователя</li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </header>

    <main>
        <div class='wrapper'>
            <div class='main-block'>
                <?php include '../includes/profile_info.php' ?>
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

    <!------------------POPUP DELETE------------------->
    <?php if (isset($_SESSION['user'])) : ?>
        <div id="popup-delete" class="popup">
            <div class="popup-body">
                <div class="popup-content popup-delete">
                    <a href="#" class="popup-close close-popup"></a>
                    <form action='../includes/delete_profile.php' class='popup-delete-to' method="post">
                        <h2>Вы уверены, что хотите удалить этот аккаунт?</h2>
                        <p>Все данные и статьи будут удалены без возможности восстановления.</p>
                        <input class="button-form" name="delete_user" type="submit" value="Да">
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!------------------POPUP UPDATE------------------->
    <?php if (isset($_SESSION['user'])) : ?>
        <div id="popup-update" class="popup">
            <div class="popup-body">
                <div class="popup-content">
                    <a href="#" class="popup-close close-popup"></a>
                    <h2>Редактирование профиля</h2>
                    <form action='../includes/update_profile.php' method="post" enctype="multipart/form-data">
                        <div class="authorization-form update-form">
                            <input class="input-form" name="last_name" type="text"
                                   value="<?= $_SESSION['user']['last_name'] ?>" placeholder="Фамилия" required><br>
                            <input class="input-form" name="first_name" type="text"
                                   value="<?= $_SESSION['user']['first_name'] ?>" placeholder="Имя" required><br>
                            <div class="radio-item">
                                <input class="input-radio" name="gender" type="radio" value="1" id="male"
                                       checked <?php if ($_SESSION['user']['gender_id'] == 1) echo "checked" ?>>
                                <label class="label-radio" for="male">Мужчина</label>
                            </div>
                            <div class="radio-item">
                                <input class="input-radio" name="gender" type="radio" value="2"
                                       id="female" <?php if ($_SESSION['user']['gender_id'] == 2) echo "checked" ?>>
                                <label class="label-radio" for="female">Женщина</label>
                            </div>
                            <input class="input-form" name="age" type="number" value="<?= $_SESSION['user']['age'] ?>"
                                   placeholder="Возраст"><br>
                            <input id="delete_avatar" class="checkbox_input" name="delete_avatar" type="checkbox"
                                   value="">
                            <label for="delete_avatar" class="checkbox_label">Удалить аватар</label><br>

                            <div class='input__wrapper'>
                                <input name='new_avatar' type='file' id='input__file' class='input input-form-file'
                                       accept='image/png, image/jpeg'>
                                <label for='input__file' class='input__file-button'>
                                    <span class='input__file-icon-wrapper'><img class='input__file-icon'
                                                                                src='../img/icons/add-file.png'
                                                                                alt='Выбрать файл' width='25'></span>
                                    <span class='input__file-button-text'>Загрузите новый аватар</span>
                                </label>
                            </div>

                            <input class="input-form" name="phone" type="number"
                                   value="<?= $_SESSION['user']['phone'] ?>" onkeypress="return event.charCode >= 48"
                                   placeholder="Мобильный телефон" required><br>
                            <input class="input-form" name="email" type="email"
                                   value="<?= $_SESSION['user']['email'] ?>" placeholder="Email" required><br>
                            <textarea class='input-form' name='about' placeholder='Информация о себе'
                                      maxlength="5000"><?= $_SESSION['user']['about'] ?></textarea><br>
                            <input class="input-form" name="update-user" type="submit" value="Обновить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!---------- POPUP ROLE UPDATE --------->

    <div id='popup_update_role' class='popup'>
        <div class='popup-body'>
            <div class='popup-content popup-delete'>
                <a href='#' class='popup-close close-popup'></a>
                <form class='popup-update-to' action='../includes/update_role.php' method='post'>
                    <h2>Изменить роль?</h2>
                    <select class='input-form' name='role'>
                        <option value='1'>Администратор</option>
                        <option value='2'>Пользователь</option>
                    </select>
                    <input class='button-form' name='edit_role' type='submit' value='Сохранить'>
                </form>
            </div>
        </div>
    </div>

    <!---------- POPUPS MESSAGE ------------>
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

    <?php if (isset($_SESSION['message_successful_update'])): ?>
        <div id="popup-message" class="popup open">
            <div class="popup-body">
                <div class="popup-content popup-message">
                    <a href="#" class="popup-close close-popup"></a>
                    <p><?= $_SESSION['message_successful_update']; ?></p>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['message_successful_update']); endif; ?>

    <?php if (isset($_SESSION['message_delete_user'])): ?>
        <div id="popup-message" class="popup open">
            <div class="popup-body">
                <div class="popup-content popup-message">
                    <a href="#" class="popup-close close-popup"></a>
                    <p><?= $_SESSION['message_delete_user']; ?></p>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['message_delete_user']); endif; ?>

    <script src='../js/popup.js'></script>
    <script src='../js/upload-file.js'></script>
    <script src='../js/drop-list.js'></script>
    <script src='../js/action_by_popup.js'></script>
    </body>
<?php endif; ?>

</html>