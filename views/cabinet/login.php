<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="login-buttons">
    <ul>
        <li><a href="/user/register/" class="login-button">новый пользователь</a></li>
        <li><a href="/user/login/" class="login-button active">вход</a></li>
    </ul>
</div>

<?php if ($_SESSION['user']) : ?>
    <div class="logout"></div>
        <h1 style="text-align:center; margin-bottom: 160px;">Здравствуйте, <?php echo $user['name']; ?>! Вы уже авторизированы!</h1>
        <form action="#" method="post">
            <a href="/user/logout/" class="button-logout">Выйти</a>
        </form>
    </div>
    <?php else : ?>

    <?php if (isset($errors) && is_array($errors)) : ?>
        <ul class="errors">
            <?php foreach ($errors as $error) : ?>
                <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="form-login">
        <form action="#" method="post">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="пароль">
            <input type="submit" value="Войти" class="button-continue" name="submit">
        </form>
    </div>
<?php endif; ?>
</body>

</html>