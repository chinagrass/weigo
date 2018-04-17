<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/4/11
 * Time: 11:28
 */
class IndexController extends Yaf_Controller_Abstract
{
    public function indexAction()
    {//默认Action
        var_dump($this->getRequest());
        $bar = new Foo_Bar();
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        $this->getView()->assign("content", "Hello World");
    }
}