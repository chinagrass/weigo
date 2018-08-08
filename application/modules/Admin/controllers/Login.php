<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/8/8
 * Time: 8:42
 * Des:
 */
class LoginController extends Yaf_Controller_Abstract
{
    public function indexAction()
    {
        $session = Yaf_Session::getInstance();
        if ($session->has('id') && $session->has('user_name')) {
            $this->redirect(MAIN_SERVER . "/admin/index/index");
        }
        $this->getView()->assign("errormsg", '');
        $post = $this->getRequest()->getPost();
        if (!empty($post['username']) && !empty($post['password'])) {
            $model = new Admin_AdminUsersModel();
            $result = $model->checkLogin($post['username'], $post['password']);
            if ($result) {

                $session->set("id", $result['id']);
                $session->set("user_name", $result['user_name']);
                $this->redirect(MAIN_SERVER . "/admin/index/index");
            }
            $errormsg = "账号密码不正确";
            $this->getView()->assign("errormsg", $errormsg);
        }
    }
    public function logoutAction()
    {
        $session = Yaf_Session::getInstance();
        $session->del("id");
        $session->del("user_name");
        $this->redirect(MAIN_SERVER . "/admin/login/index");
    }
}