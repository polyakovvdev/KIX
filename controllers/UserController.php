<?php

class UserController {

    public static function actionLogin() {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный емайл';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            }
            else {
                User::auth($userId);
                header("Location: /");
                
            }

        }
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        require_once(ROOT.'/views/cabinet/login.php');
        return true;
    }

    public static function actionRegister() {

        $name = '';
        $email = '';
        $phonenumb = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phonenumb = $_POST['phonenumb'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2 символов!';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный емайл';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов!';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой емайл уже используется!';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $phonenumb, $password);
                header("Location: /");
            }
        }

        require_once(ROOT.'/views/cabinet/register.php');
        return true;
    }

    public static function actionLogout() {
        unset($_SESSION['user']);
        header('Location: /');
    }
}