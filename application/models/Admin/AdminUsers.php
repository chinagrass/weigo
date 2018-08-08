<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/8/7
 * Time: 13:20
 * Des:
 */
class Admin_AdminUsersModel
{
    private $pdo;

    protected function getPDO()
    {
        $this->pdo = new DB_PDO();
        return $this->pdo->getConnect();
    }

    public function checkLogin($username, $password)
    {
        /** @var PDO $pdo */
        $pdo = $this->getPDO();
        $password = md5(md5($password . 'users') . 'users');
        $sql = "select * from users where user_name=? and password=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        $result = $stmt->fetch();
        return $result;
    }

}