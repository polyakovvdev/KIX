<?php include ROOT . '/views/layouts/header.php'; ?>

<?php if (isset($errors) && is_array($errors)) : ?>
    <ul class="errors">
        <?php foreach ($errors as $error) : ?>
            <li>- <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="form-order-container">
    <div class="form-order">
        <form action="#" method="post">

            <p>Ваша email</p>
            <input type="email" name="userEmail" placeholder="" value="<?php echo $userEmail; ?>" />

            <p>Номер телефона</p>
            <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>" />

            <br /><br />
            <input type="text" name="userAddress" placeholder="Адресс" value="<?php echo $userAddress; ?>" />

            <br />
            <br />
            <input type="submit" name="submit" value="Оформить" class="form-order__button" />
        </form>
    </div>
</div>
<?php if ($orderIsProcessed) : ?>
    <p class="order-subtitle">
        Заказ оформлен! Мы с вами свяжемся в ближайшее время.
    </p>
<?php endif; ?>