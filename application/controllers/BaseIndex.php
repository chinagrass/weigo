<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/5/11
 * Time: 13:25
 */
class BaseIndexController extends Yaf_Controller_Abstract
{
    public function init()
    {
        $dispatcher=Yaf_Dispatcher::getInstance();
        $config = Yaf_Registry::get("config");
        $layoutsDir = $config->get("application.layouts.dir");
        $layoutsFile = $config->get("application.layouts.index");;
        $layouts = new LayoutsPlugin($layoutsFile, $layoutsDir);
        $dispatcher->registerPlugin($layouts);
    }
}