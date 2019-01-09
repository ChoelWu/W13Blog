<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/9
 * Time: 10:44
 */

class Mysql
{
    public $host;
    public $userName;
    public $dbName;
    public $pwd;
    public $con;

    public function __construct($db_host, $db_user, $db_pwd, $db_name)
    {
        $this->host = $db_host;
        $this->userName = $db_user;
        $this->pwd = $db_pwd;
        $this->dbName = $db_name;
        $this->connect();
    }

    public function connect()
    {
        $this->con = mysqli_connect($this->host, $this->userName, $this->pwd, $this->dbName);
    }

    public function getOne()
    {

    }

    /**
     * 获得全部满足条件的数组数据集合
     * @param $sql
     * @return array|null
     */
    public function getAll($sql)
    {
        $result = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($this->con);
        return $data;
    }
}