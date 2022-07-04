<?php

class SiteController {

    public static function actionIndex() {

        $products = array();
        $products = Product::getProducts();

        require_once(ROOT.'/views/site/index.php');
        return true;
    }
}