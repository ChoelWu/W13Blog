<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: base.php
// +----------------------------------------------------------------------
// | Date: 2019/1/17
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

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

    public function getRow($table, $where)
    {
        $whereArr = [];
        do {
            $whereArr[] = '`' . key($where) . '`=' . current($where);
        } while (next($where));
        $whereStr = implode(' AND ', $whereArr);
        $sql = 'SELECT * FROM `' . $table . '` WHERE ' . $whereStr;
        $result = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $data;
    }

    /**
     * 获得一行数据中某个字段的值
     * @param $table
     * @param $column
     * @param $where
     * @return array|null
     */
    public function getOne($table, $column, $where)
    {
        $whereArr = [];
        do {
            $whereArr[] = '`' . key($where) . '`=' . current($where);
        } while (next($where));
        $whereStr = implode(' AND ', $whereArr);
        $sql = 'SELECT `' . $column . '` FROM `' . $table . '` WHERE ' . $whereStr;
        $result = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($result);
        $data = $data[$column];
        mysqli_free_result($result);
        return $data;
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
        return $data;
    }

    /**
     * 插入一条记录
     * @param $table
     * @param $dataArr
     * @return bool|mysqli_result
     */
    public function setRow($table, $dataArr)
    {
        $tableStructure = 'DESC `' . $table . '`';
        $tableResult = mysqli_query($this->con, $tableStructure);
        $tableField = mysqli_fetch_all($tableResult, MYSQLI_ASSOC);
        $value = [];
        $field = [];
        echo '<pre>';
        foreach ($tableField as $t_field) {
            if (isset($dataArr[$t_field['Field']])) {
                $count = false;
                foreach (['int', 'float', 'double'] as $type) {
                    $count = strpos($t_field['Type'], $type);
                }
                if (!$count) {
                    $value[] = '"' . $dataArr[$t_field['Field']] . '"';
                }
            } else {
                $value[] = 'null';
            }
            $field[] = $t_field['Field'];
        }
        $fieldStr = implode('`,`', $field);
        $valueStr = implode(',', $value);
        $sql = 'INSERT INTO `' . $table . '` (`' . $fieldStr . '`) VALUE(' . $valueStr . ');';
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            die('MYSQL ERROR:' . mysqli_errno($this->con) . mysqli_error($this->con));
        }
        return $result;
    }

    /**
     * 删除
     * @param $table
     * @param $where
     * @return bool|mysqli_result
     */
    public function delete($table, $where)
    {
        $whereArr = [];
        do {
            $whereArr[] = '`' . key($where) . '`=' . current($where);
        } while (next($where));
        $whereStr = implode(' AND ', $whereArr);
        $sql = 'DELETE FROM `' . $table . '` WHERE ' . $whereStr . ';';
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function updateRow($table, $data, $where)
    {
        $where_arr = [];
        $value_arr = [];
        foreach ($where as $key => $w_item) {
            $where_arr[] = '`' . $key . '`=' . $w_item;
        }
        foreach ($data as $key => $d_item) {
            $value_arr[] = '`' . $key . '`=' . $d_item;
        }
        $where_sql = implode(' AND ', $where_arr);
        $value_sql = implode(',', $value_arr);
        $sql = 'UPDATE `' . $table . '` SET ' . $value_sql . ' WHERE ' . $where_sql . ';';
        var_dump($sql);
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
}