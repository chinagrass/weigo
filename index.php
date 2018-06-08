<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/')); /* 指向public的上一级 */
define("APP_VIEW", APP_PATH."/application/views");
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->run();