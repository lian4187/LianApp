<?php

namespace LianApp\Lian\Base\Dao\DB;

/**
 * Interface IDB
 * @author lian <lianxiaoyang.happy@163.com>
 */
interface IDB
{
    /**
     * connect
     * 创建一个db连接
     * @param string $userName
     * @param string $password
     * @param string $host
     * @param int $port
     * @access public
     * @return Object
     */
    public function connect($userName, $password, $host, $port);

    /**
     * query
     * 执行一条sql
     * @param string $sql
     * @access public
     * @return Object
     */
    public function query($sql);

    /**
     * select
     *
     * @param string $sql
     * @access public
     * @return Object
     */
    public function select($sql);

    /**
     * insert
     *
     * @param string $sql
     * @access public
     * @return Object
     */
    public function insert($sql);

    /**
     * update
     *
     * @param string $sql
     * @access public
     * @return Object
     */
    public function update($sql);

    /**
     * delete
     *
     * @param sql $sql
     * @access public
     * @return Object
     */
    public function delete($sql);

    /**
     * beginTransaction
     *
     * @access public
     * @return bool
     */
    public function beginTransaction();

    /**
     * commit
     *
     * @access public
     * @return bool
     */
    public function commit();

    /**
     * rollBack
     *
     * @access public
     * @return bool
     */
    public function rollBack();

    /**
     * inTransaction
     *
     * @access public
     * @return bool
     */
    public function inTransaction();

    /**
     * lastInsertId
     *
     * @access public
     * @return int
     */
    public function lastInsertId();
}
