<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/8/7
 * Time: 19:19
 * Des:
 */
class BaseAdminController extends Yaf_Controller_Abstract
{
    public function init()
    {
        $session = Yaf_Session::getInstance();
        if ($session->has('id') && $session->has('user_name')) {
            $dispatcher = Yaf_Dispatcher::getInstance();
            $config = Yaf_Registry::get("config");
            $layoutsDir = $config->get("application.layouts.dir");
            $layoutsFile = $config->get("application.layouts.admin");;
            $layouts = new LayoutsPlugin($layoutsFile, $layoutsDir);
            $dispatcher->registerPlugin($layouts);
            $this->getView()->assign("userName",$session->get('user_name'));
        } else {
            $this->redirect(MAIN_SERVER . "/admin/login/index");
        }
    }
}