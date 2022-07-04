<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<a href="/admin/product/create" class="admin-add-product"> Добавить товар</a>

<h4 style="margin-left:80px;">Список товаров</h4>

<br />

<table>
    <tr>
        <th>ID товара</th>
        <th>Название модели</th>
        <th>Цена</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($productsList as $product) : ?>
        <tr>
            <td><?php echo $product['id_product']; ?></td>
            <td><?php echo $product['model_name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><a href="/admin/product/update/<?php echo $product['id_product']; ?>" title="Редактировать"><img src="/template/images/edit.png" alt="" style="height: 24px;"></a></td>
            <td><a href="/admin/product/delete/<?php echo $product['id_product']; ?>" title="Удалить"><img src="/template/images/close.png" alt="" style="height: 24px;"></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/admin/" class="admin-link-back">Назад</a>