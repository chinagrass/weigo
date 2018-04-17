<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/4/13
 * Time: 12:53
 */
class BarController extends Yaf_Controller_Abstract
{
    public function fooAction()
    {//默认Action
        $bar = new Foo_Bar();
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        var_dump($router,$_GET);
        die;
        $this->getView()->assign("content", "Hello World");
    }
}
