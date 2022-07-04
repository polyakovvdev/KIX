<?php

class CatalogController {

    public static function actionMale() {

        $products = array();
        $products = Product::getMaleProducts();

        require_once(ROOT.'/views/catalog/male.php');
        return true;
    } 

    public static function actionFemale() {

        $products = array();
        $products = Product::getFemaleProducts();

        require_once(ROOT.'/views/catalog/female.php');
        return true;
    } 
}