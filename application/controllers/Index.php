<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/4/11
 * Time: 11:28
 */
class IndexController extends BaseIndexController
{
    public function indexAction()
    {
        $this->getView()->assign("content", "Hello World");
    }

    public function testAction()
    {
        echo "test";die;
    }
}