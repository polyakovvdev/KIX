<?php

class Order {

    public static function save($userEmail, $userPhone, $userAddress, $userId, $products)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO orders (user_email, user_phone, user_address, user_id, products) '
                . 'VALUES (:user_email, :user_phone, :user_address, :user_id, :products)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_address', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getOrdersList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id_order, user_email, user_phone, date, status, user_id FROM orders ORDER BY id_order DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id_order'] = $row['id_order'];
            $ordersList[$i]['user_email'] = $row['user_email'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    public static function getOrderById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM orders WHERE id_order = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function updateOrderById($id, $userEmail, $userPhone, $userAddress, $date, $status)
    {
        $db = Db::getConnection();
        $sql = "UPDATE orders
            SET 
                user_email = :user_email, 
                user_phone = :user_phone, 
                user_address = :user_address, 
                date = :date, 
                status = :status 
            WHERE id_order = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_address', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM orders WHERE id_order = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}