<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="delete-order">
    <h4>Удалить заказ #<?php echo $id; ?></h4>


    <p>Вы действительно хотите удалить этот заказ?</p>

    <form method="post">
        <input type="submit" name="submit" value="Удалить" />
    </form>
</div>