<?php include ROOT . '/views/layouts/header_admin.php'; ?>


<h4 style="margin: 60px 0px 0px 80px;">Редактировать заказ #<?php echo $id; ?></h4>

<br />

<div class="admin-order-update">
    <form action="#" method="post">

        <p>Email клиента</p>
        <input type="email" name="userEmail" placeholder="" value="<?php echo $order['user_email']; ?>">

        <p>Телефон клиента</p>
        <input type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

        <p>Адресс клиента</p>
        <input type="text" name="userAddress" placeholder="" value="<?php echo $order['user_address']; ?>">

        <p style="margin-left: 20px;">Дата оформления заказа</p>
        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

        Статус
        <select name="status">
            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
        </select>
        <br>
        <br>
        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
    </form>
</div>
<br>
<a href="/admin/order/" class="admin-link-back">Назад</a>