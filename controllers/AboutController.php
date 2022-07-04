<?php

class AboutController {

    public static function actionIndex() {

        require_once(ROOT.'/views/about/index.php');
        return true;
    }
}