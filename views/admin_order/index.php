<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<h1 style="margin: 60px 0px 0px 80px;">Заказы</h1>

<table style="margin-top: 60px">
    <tr>
        <th>ID заказа</th>
        <th>Email покупателя</th>
        <th>Телефон покупателя</th>
        <th>Дата оформления</th>
        <th>Статус</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($ordersList as $order) : ?>
        <tr>
            <td>
                <a href="/admin/order/view/<?php echo $order['id_order']; ?>">
                    <?php echo $order['id_order']; ?>
                </a>
            </td>
            <td><?php echo $order['user_email']; ?></td>
            <td><?php echo $order['user_phone']; ?></td>
            <td><?php echo $order['date']; ?></td>
            <td><?php echo Order::getStatusText($order['status']); ?></td>
            <td><a href="/admin/order/view/<?php echo $order['id_order']; ?>" title="Смотреть"><img src="/template/images/view.png" alt="" style="height: 24px;"></a></td>
            <td><a href="/admin/order/update/<?php echo $order['id_order']; ?>" title="Редактировать"><img src="/template/images/edit.png" alt="" style="height: 24px;"></a></td>
            <td><a href="/admin/order/delete/<?php echo $order['id_order']; ?>" title="Удалить"><img src="/template/images/close.png" alt="" style="height: 24px;"></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/admin/" class="admin-link-back">Назад</a>