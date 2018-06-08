<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/5/15
 * Time: 20:48
 */
class LayoutsPlugin extends Yaf_Plugin_Abstract
{
    private $_layoutDir;
    private $_layoutFile;
    private $_layoutVars = array();

    public function __construct($layoutFile, $layoutDir = null)
    {
        $this->_layoutFile = $layoutFile;
        $this->_layoutDir = ($layoutDir) ? $layoutDir : APP_VIEW . '\layouts';
    }

    public function  __set($name, $value)
    {
        $this->_layoutVars[$name] = $value;
    }

    /**
     * 在路由之前执行,这个钩子里，你可以做url重写等功能
     * @param Yaf_Request_Abstract $request
     * @param Yaf_Response_Abstract $response
     */
    public function  routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {

    }

    /**
     * 路由完成后，在这个钩子里，你可以做登陆检测等功能
     * @param Yaf_Request_Abstract $request
     * @param Yaf_Response_Abstract $response
     */
    public function  routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {

    }

    public function  dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {

    }

    public function  preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {

    }

    public function  postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {

    }

    /**
     * final hoook in this hook user can do loging or implement layout
     * @param Yaf_Request_Abstract $request
     * @param Yaf_Response_Abstract $response
     */
    public function  dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {
        $body = $response->getBody();
        /*clear existing response*/
        $response->clearBody();
        $layout = new Yaf_View_Simple($this->_layoutDir);
        $layout->assign('layout', $this->_layoutVars);
        $layout->assign('content', $body);
        /* set the response to use the wrapped version of the content */
        $response->setBody($layout->render($this->_layoutFile));
    }
}