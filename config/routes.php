<?php

return array (

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'about' => 'about/index',

    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart' => 'cart/index',

    'catalog/male' => 'catalog/male',
    'catalog/female' => 'catalog/female',

    'product/([0-9]+)' => 'product/view/$1',
    'product' => 'product/index',

    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',

    'admin/statistics1' => 'adminStatistics/isPopular',
    'admin/statistics2' => 'adminStatistics/isProfit',

    'admin' => 'admin/index',

    '' => 'site/index' 
);