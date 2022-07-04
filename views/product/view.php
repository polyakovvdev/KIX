<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="product-container">
        <div class="product-info">
            <div class="product-images">
                <img src="/template/images/<?php echo $product['image']; ?>" alt="" class="big-img">
            </div>
            <div class="product-description">
                <div class="product-description__title">описание</div>
                <div class="product-info__name"><?php echo $product['model_name']; ?></div>
                <div class="product-info__text"><?php echo $product['description']; ?></div>
            </div>
        </div>
        <div class="product-add-cart">
            <div class="product-add-cart__title"><?php echo $product['model_name']; ?></div>
            <div class="product-add-cart__price"><?php echo $product['price']; ?>&#8381;</div>
            
            <div class="product-add-cart__form">
                <a href="/cart/add/<?php echo $product['id_product']; ?>">Добавить в корзину</a>
            </div>
            <div class="product-add-cart__subtitle">
                <a href="/cart/" class="link-cart">Корзина</a>
                <img src="/template/images/cart.png" alt="" class="cart">
            </div>
        </div>
    </section>
</body>

</html>