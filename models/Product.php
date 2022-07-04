<?php

class Product {

    public static function getProducts() {
        $db = Db::getConnection();
        $products = array();

        $result = $db->query('SELECT DISTINCT id_product, image, model_name, price FROM products GROUP BY model_name');

        $i = 0;

        while($row = $result->fetch()) {
            $products[$i]['id_product'] = $row['id_product'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['model_name'] = $row['model_name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getMaleProducts() {
        $db = Db::getConnection();
        $products = array();

        $result = $db->query("SELECT DISTINCT id_product, image, model_name, price FROM products WHERE sex='male' GROUP BY model_name");

        $i = 0;

        while($row = $result->fetch()) {
            $products[$i]['id_product'] = $row['id_product'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['model_name'] = $row['model_name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getFemaleProducts() {
        $db = Db::getConnection();
        $products = array();

        $result = $db->query("SELECT DISTINCT id_product, image, model_name, price FROM products WHERE sex='female' GROUP BY model_name");

        $i = 0;

        while($row = $result->fetch()) {
            $products[$i]['id_product'] = $row['id_product'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['model_name'] = $row['model_name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getProductById($id) {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM products WHERE id_product='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getProductByIds($idsArray) {
        $products = array();
        $db = Db::getConnection();
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM products WHERE id_product IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id_product'] = $row['id_product'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['model_name'] = $row['model_name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getProductsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id_product, model_name, price FROM products ORDER BY id_product ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id_product'] = $row['id_product'];
            $productsList[$i]['model_name'] = $row['model_name'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO products '
                . '(brand, model_name, price, sex, description,'
                . 'count)'
                . 'VALUES '
                . '(:brand, :model_name, :price, :sex, :description,'
                . ':count)';

        $result = $db->prepare($sql);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':model_name', $options['model_name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':sex', $options['sex'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':count', $options['count'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE products
            SET 
                brand = :brand, 
                model_name = :model_name, 
                price = :price, 
                sex = :sex, 
                description = :description,
                count = :count 
            WHERE id_product = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':model_name', $options['model_name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':sex', $options['sex'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':count', $options['count'], PDO::PARAM_INT);
        
        return $result->execute();
    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM products WHERE id_product = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function addImage($image, $id) {

        $db = Db::getConnection();
        $sql = 'UPDATE products  SET image = :image WHERE id_product = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function addOrder($id) {

        $db = Db::getConnection();
        $sql = "UPDATE products SET count_orders = (count_orders + 1) WHERE id_product = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}