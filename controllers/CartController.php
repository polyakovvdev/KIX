<?php

class CartController {

    public static function actionIndex() {

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT.'/views/cart/index.php');
        return true;
    }

    public static function actionAdd($id) {
        Cart::addProduct($id);

        Product::addOrder($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }

    public function actionDelete($id) {
        Cart::deleteProduct($id);
        header("Location: /cart");
        return true;
    }

    public function actionCheckout() {     
        $productsInCart = Cart::getProducts();

        if ($productsInCart == false) {
            header("Location: /");
        }

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        // Количество товаров
        $totalQuantity = Cart::countItems();

        $userEmail = false;
        $userPhone = false;
        $userAddress = false;

        $result = false;

        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userEmail = $user['email'];
        } else {
            $userId = false;
        }

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userPhone = $_POST['userPhone'];
            $userAddress = $_POST['userAddress'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }

            if ($errors == false) {
                $result = Order::save($userEmail, $userPhone, $userAddress, $userId, $productsInCart);

                if ($result) {
                    $orderIsProcessed = true;              
                    $adminEmail = 'anonim050900@gmail.com';
                    $message = 'Список заказов';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);
                    Cart::clear();
                }
            }
        }
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}