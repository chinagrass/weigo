<?php

/**
 * 当该Controller下有未捕获的异常, 则控制流会流到这里,可以在这里将相应的错误输出
 * Created by PhpStorm.
 * User: David
 * Date: 2018/4/11
 * Time: 11:28
 */
class ErrorController extends Yaf_Controller_Abstract
{
    /**
     * 也可通过$request->getException()获取到发生的异常
     */
    public function errorAction($exception)
    {
        echo "Error: ".$exception->getCode();die;
    }
}