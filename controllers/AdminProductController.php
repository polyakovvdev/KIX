<?php

class AdminProductController extends AdminBase {

    public static function actionIndex() {
        self::checkAdmin();

        $productsList = Product::getProductsList();
        require_once(ROOT.'/views/admin_product/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $options['brand'] = $_POST['brand'];
            $options['model_name'] = $_POST['model_name'];
            $options['price'] = $_POST['price'];
            $options['sex'] = $_POST['sex'];
            $options['description'] = $_POST['description'];
            $options['count'] = $_POST['count'];

            
            $errors = false;

            if (!isset($options['model_name']) || empty($options['model_name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                $id = Product::createProduct($options);
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$id}.png");

                        $add_image = Product::addImage("{$id}.png", $id);
                    }
                };

                header("Location: /admin/");
            }
        }

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    public static function actionUpdate($id)
    {
        self::checkAdmin();
        $product = Product::getProductById($id);

        if (isset($_POST['submit'])) {
            $options['brand'] = $_POST['brand'];
            $options['model_name'] = $_POST['model_name'];
            $options['price'] = $_POST['price'];
            $options['sex'] = $_POST['sex'];
            $options['description'] = $_POST['description'];
            $options['count'] = $_POST['count'];

            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {
               header("Location: /admin/product");
            }
        }

        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }

        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }
}