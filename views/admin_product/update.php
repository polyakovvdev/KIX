<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<br><br>
<h4 style="margin-left:80px;">Редактировать товар #<?php echo $id; ?></h4>
<br />

<div class="admin-product-create">
    <form action="#" method="post" enctype="multipart/form-data">

        <p>Бренд товара</p>
        <input type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

        <p>Название модели</p>
        <input type="text" name="model_name" placeholder="" value="<?php echo $product['model_name']; ?>">

        <p>Стоимость, &#8381;</p>
        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

        <p>Пол</p>
        <select name="sex">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>

        <br /><br />

        <p>Детальное описание</p>
        <input type="text" name="description" value="<?php echo $product['description']; ?>">


        <br /><br />

        <p>Количество пар</p>
        <input type="text" name="count" placeholder="" value="">

        <br /><br />

        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

        <br /><br />

    </form>

</div>
<br>
<a href="/admin/product/" class="admin-link-back">Назад</a>