<?php

class adminStatistics {

    public static function getPopularProducts() {
        $db = Db::getConnection();
        $sql = "SELECT model_name, count_orders FROM products WHERE count_orders > 0 ORDER BY count_orders DESC";
        $products = array();

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['model_name'] = $row['model_name'];
            $products[$i]['count_orders'] = $row['count_orders'];
            $i++;
        }

        return $products;
    }

    public static function getProfitProducts() {
        $db = Db::getConnection();
        $sql = "SELECT model_name, count_orders, price * count_orders AS summary_price FROM products WHERE count_orders > 0 ORDER BY price*count_orders DESC";
        $products = array();

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['model_name'] = $row['model_name'];
            $products[$i]['count_orders'] = $row['count_orders'];
            $products[$i]['summary_price'] = $row['summary_price'];
            $i++;
        }

        return $products;
    }
}