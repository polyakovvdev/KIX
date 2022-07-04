<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="login-buttons">
    <ul>
        <li><a href="/user/register/" class="login-button active">новый пользователь</a></li>
        <li><a href="/user/login/" class="login-button">вход</a></li>
    </ul>
</div>
<?php if ($result) : ?>
    <p style="margin: 0px auto;text-align:center">Вы зарегестрированы!</p>
<?php else : ?>
    <?php if (isset($errors) && is_array($errors)) : ?>
        <ul class="errors">
            <?php foreach ($errors as $error) : ?>
                <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="form-register">
        <form action="#" method="post">
            <input type="text" name="name" placeholder="имя">
            <input type="tel" name="phonenumb" placeholder="телефон">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="пароль">
            <input type="submit" name="submit" value="Продолжить" class="button-continue">
        </form>
    <?php endif; ?>
    </div>

    </body>

    </html>