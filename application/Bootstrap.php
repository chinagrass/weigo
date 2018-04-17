<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/4/11
 * Time: 13:27
 */
class Bootstrap extends Yaf_Bootstrap_Abstract
{
    public function _initConfig()
    {
        var_dump($_SERVER);
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
    }

    public function _initLoader()
    {
        //申明, 凡是以Foo和Local开头的类, 都是本地类
        $loader = Yaf_Loader::getInstance();
        $loader->registerLocalNamespace(array("Foo", "Local"));
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
        $user = new UserPlugin();
        $dispatcher->registerPlugin($user);
    }

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        /**
         * 添加配置中的路由
         */
        //var_dump($router,Yaf_Registry::get("config")->routes);die;
        $router->addConfig(Yaf_Registry::get("config")->routes);
    }

    public function _initDefaultName(Yaf_Dispatcher $dispatcher)
    {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
}