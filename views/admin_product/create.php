<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="admin-product-create">
    <form action="#" method="post" enctype="multipart/form-data">

        <p>Бренд</p>
        <input type="text" name="brand" placeholder="" value="">

        <p>Название модели</p>
        <input type="text" name="model_name" placeholder="" value="">

        <p>Стоимость, &#8381;</p>
        <input type="text" name="price" placeholder="" value="">

        Пол
        <select name="sex">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>

        <br /><br />

        <p>Описание</p>
        <input type="text" name="description" placeholder="" value="">

        <p>Изображение товара</p>
        <input type="file" name="image" placeholder="" value="">

        <br /><br />

        <br /><br />

        <p>Количество пар</p>
        <input type="text" name="count" placeholder="" value="">

        <br /><br />

        <input type="submit" name="submit" value="Сохранить">

        <br /><br />

    </form>
</div>
<br /><br />
<a href="/admin/product/" class="admin-link-back">Назад</a>