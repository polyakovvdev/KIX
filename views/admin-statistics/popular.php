<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<br><br>
<h2 style="margin-left: 80px;">Популярность кроссовок:</h2>
<br><br>

<table style="text-transform:uppercase;">
    <tr>
        <th>Название модели</th>
        <th>Количество заказов</th>
    </tr>
    <?php foreach ($productsList as $product) : ?>
        <tr>
            <td><?php echo $product['model_name']; ?></td>
            <td><?php echo $product['count_orders']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/admin/" class="admin-link-back" style="margin-left: 83px; margin-bottom: 60px; display:inline-block;">Назад</a>