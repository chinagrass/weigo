<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 2018/8/6
 * Time: 18:07
 * Des:
 */
class DB_PDO
{
    /** @var  PDO $conn */
    protected $conn;

    public function __construct($dbname = '', $key = 'mysql.default')
    {
        $config = Yaf_Registry::get("config");
        $mysql = $config->get($key);
        if (!empty($mysql)) {
            $dbname = $mysql->get("database");
        }
        $this->connect($mysql->get("host"), $mysql->get("username"), $mysql->get("password"), $dbname);
    }

    protected function connect($host, $user, $password, $dbname)
    {

        $connect = new \PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $this->conn = $connect;
    }
    public function getConnect()
    {
        return $this->conn;
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }

    public function close()
    {
        unset($this->conn);
    }
}