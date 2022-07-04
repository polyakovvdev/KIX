<?php

class ProductController {

    public static function actionIndex() {

        require_once(ROOT.'/views/product/index.php');
        return true;
    }

    public static function actionView($productId) {

        $product = Product::getProductById($productId);

        require_once(ROOT.'/views/product/view.php');
        return true;
    }
}