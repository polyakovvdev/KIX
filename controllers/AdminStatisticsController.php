<?php

class AdminStatisticsController extends AdminBase {

    public static function actionIsPopular() {

        self::checkAdmin();

        $productsList = AdminStatistics::getPopularProducts();

        require_once(ROOT.'/views/admin-statistics/popular.php');
        return true;
    }

    public static function actionIsProfit() {

        self::checkAdmin();

        $productsList = AdminStatistics::getProfitProducts();

        require_once(ROOT.'/views/admin-statistics/profit.php');
        return true;
    }
}