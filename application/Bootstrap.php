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
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
    }

    public function _initLoader()
    {
        //Yaf_Loader::implort();
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
        /*$user = new UserPlugin();
        $dispatcher->registerPlugin($user);
        $config = Yaf_Registry::get("config");
        $layoutsDir = $config->get("application.layouts.dir");
        $layoutsFile = 'index.phtml';
        $layouts = new LayoutsPlugin($layoutsFile, $layoutsDir);
        $dispatcher->registerPlugin($layouts);*/
    }

    public function _initLayouts(Yaf_Dispatcher $dispatcher)
    {
        $config = Yaf_Registry::get("config");
        $layoutsDir = $config->get("application.layouts.dir");
        $layoutsFile = $config->get("application.layouts.index");;
        $layouts = new LayoutsPlugin($layoutsFile, $layoutsDir);
        $dispatcher->registerPlugin($layouts);
    }


}