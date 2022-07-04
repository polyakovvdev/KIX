<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="order-title">
    мой заказ
</div>

<?php if (isset($products) && is_array($products)) : ?>

    <div class="order-list">
        <?php foreach ($products as $product) : ?>
            <div class="order-item">
                <img src="/template/images/<?php echo $product['image']; ?>" alt="" class="item-image">
                <div class="item-info">
                    <div class="item-info__name"><?php echo $product['model_name']; ?></div>
                </div>
                <div class="count-product"><?php echo $productsInCart[$product['id_product']]; ?> шт</div>
                <div class="item-price"><?php echo $product['price']; ?>&#8381;</div>
                <div class="img-close">
                    <a href="/cart/delete/<?php echo $product['id_product']; ?>"><img src="/template/images/close.png" alt=""></a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


    <div class="price">
        <div class="price-title">Общая стоимость</div>
        <div class="summary-price"><?php echo $totalPrice; ?>&#8381;</div>
    </div>

    <a href="/cart/checkout/" class="adress-form__button">Оформить заказ</a>
    <?php if($flagAddProduct): ?>
        Товар добавлен в корзину
    <?php endif;?>
    </body>

<?php else : ?>
    <h2 style="text-align: center; margin-top: 160px;">Ваша корзина пуста!</h2>
<?php endif; ?>


</html>