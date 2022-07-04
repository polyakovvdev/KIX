<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="order-view">
    <h2>Просмотр заказа #<?php echo $order['id_order']; ?></h2>
    <br />

    <h5>Информация о заказе</h5>
    <table>
        <tr>
            <td>Номер заказа</td>
            <td><?php echo $order['id_order']; ?></td>
        </tr>
        <tr>
            <td>Email клиента</td>
            <td><?php echo $order['user_email']; ?></td>
        </tr>
        <tr>
            <td>Телефон клиента</td>
            <td><?php echo $order['user_phone']; ?></td>
        </tr>
        <tr>
            <td>Адресс клиента</td>
            <td><?php echo $order['user_address']; ?></td>
        </tr>
        <?php if ($order['user_id'] != 0) : ?>
            <tr>
                <td>ID клиента</td>
                <td><?php echo $order['user_id']; ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><b>Статус заказа</b></td>
            <td><?php echo Order::getStatusText($order['status']); ?></td>
        </tr>
        <tr>
            <td><b>Дата заказа</b></td>
            <td><?php echo $order['date']; ?></td>
        </tr>
    </table>

    <h5>Товары в заказе</h5>

    <table class="table-admin-medium table-bordered table-striped table ">
        <tr>
            <th>ID товара</th>
            <th>Название модели</th>
            <th>Цена</th>
            <th>Количество пар</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['id_product']; ?></td>
                <td><?php echo $product['model_name']; ?></td>
                <td>&#8381;<?php echo $product['price']; ?></td>
                <td><?php echo $productsQuantity[$product['id_product']]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<a href="/admin/order/" class="admin-link-back" style="margin-left: 68px; display: inline-block;">Назад</a>