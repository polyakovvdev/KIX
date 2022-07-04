<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="delete-product">
    <h4>Удалить товар #<?php echo $id; ?></h4>


    <p>Вы действительно хотите удалить этот товар?</p>

    <form method="post">
        <input type="submit" name="submit" value="Удалить" />
    </form>
</div>