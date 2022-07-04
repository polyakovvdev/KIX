<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/css/main.css">
    <link rel="stylesheet" href="/template/css/media.css">
    <title>KIX</title>
</head>

<body>
    <!-- Баннер начало -->
    <div class="banner">
        <div class="header">
            <ul class="header__list">
                <li class="header__element">
                    <img src="/template/images/email.png" alt="" class="header__email-image">
                    <a href="mailto:ssau@ssau.com" class="header__email-link">ssau@ssau.com</a>
                </li>
                <li class="header__element">
                    <img src="/template/images/address.png" alt="" class="header__address-image">
                    <a href="https://yandex.ru/maps/51/samara/house/molodogvardeyskaya_ulitsa_141/YUkYdwdmTkAGQFtpfX5xcX9rbA==/?ll=50.106751%2C53.200388&z=17.1" target="_blank" class="header__address-link">г. Самара, ул. Молодогвадрейская, 151, оф. 34</a>
                </li>
                <li class="header__element">
                    <a href="/" class="header__element-link">Главная</a>
                </li>
                <li class="header__element">
                    <a href="/user/register/" class="header__element-link">Личный кабинет</a>
                </li>
                <li class="header__element">
                    <a href="#products" class="header__element-link">Товары</a>
                </li>
                <li class="header__element">
                    <a href="/about/" class="header__element-link">О нас</a>
                </li>
                <li class="header__element">
                    <img src="/template/images/telephone.png" alt="" class="header__telephone-image">
                    <a href="tel:+78005553535" class="header__element-link">8(800) 555 35-35</a>
                </li>
            </ul>
        </div>
        <div class="banner-title">
            <div class="banner-title__name">kix</div>
            <div class="banner-social">
                <div class="banner-title__text">теперь мы во всех социальных сетях</div>
                <div class="banner_title__social">
                    <ul class="banner_title__social-links">
                        <li>
                            <a href="https://www.instagram.com/optimusgang/?hl=ru" target="_blank" class="banner_title__social-link"><img src="/template/images/instagram.png" alt="Instagram"></a>
                        </li>
                        <li>
                            <a href="https://vk.com/durov" target="_blank" class="banner_title__social-link"><img src="/template/images/vk.png" alt="VK"></a>
                        </li>
                        <li>
                            <a href="https://t.me/elonmusk_ru" target="_blank" class="banner_title__social-link"><img src="/template/images/telegram.png" alt="Telegram"></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/elonmusk" target="_blank" class="banner_title__social-link"><img src="/template/images/twitter.png" alt="Twitter"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <img src="/template/images/banner_snicker.png" alt="" class="banner__image">
    </div>
    <!-- Баннер конец -->

    <!-- Навигация по полу + корзина начало -->
    <div class="navigation">
        <ul>
            <li>kix</li>
            <li><a href="/catalog/male/" class="button-nav active">мужчины</a></li>
            <li><a href="/catalog/female/" class="button-nav">женщины</a></li>
            <li><a href="/cart/" class="button-nav">корзина(<?php echo Cart::countItems(); ?>)</a><img src="/template/images/cart.png" alt="" class="img-cart"></li>
        </ul>
    </div>
    <!-- Навигация по полу + корзина конец -->
    <!-- Каталог начало -->
    <div class="catalog"><a name="products"></a>
        <?php foreach ($products as $product) : ?>
            <div class="product">
                <img src="/template/images/<?php echo $product['image']; ?>" alt="" class="product-img">
                <div class="product-name"><a href="/product/<?php echo $product['id_product']; ?>"><?php echo $product['model_name']; ?></a></div>
                <div class="product-price"><?php echo $product['price']; ?>&#8381;</div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Каталог конец -->

</body>

</html>