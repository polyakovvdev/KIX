<?php

class AdminController {

    public static function actionIndex() {

        require_once(ROOT.'/views/admin/index.php');
        return true;
    }
}