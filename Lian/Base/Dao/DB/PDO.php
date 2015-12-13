<?php

namespace LianApp\Lian\Base\Dao\DB;

/**
 * Class PDO
 * TODO: sql inject problem
 * @author lian <lianxiaoyang.happy@163.com>
 */
class PDO implements IDB
{
    private $dbh;
    /**
     * connect
     *
     * @return void
     */
    public function connect($userName, $password, $host, $port)
    {
        $dsn = 'mysql:host=' . $host . ';port=' . $port;
        $options = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        $this->dbh = new \PDO($dsn, $userName, $password, $options);
        var_export($dsn);
    }

    /**
     * query
     *
     * @return void
     */
    public function query($sql)
    {
        return $this->dbh->query($sql);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    private function exec($sql)
    {
        return $this->dbh->exec($sql);
    }


    /**
     * select
     *
     * @return void
     */
    public function select($sql)
    {
        return $this->query($sql);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert($sql)
    {
        return $this->exec($sql);
    }

    /**
     * update
     *
     * @return void
     */
    public function update($sql)
    {
        return $this->exec($sql);
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete($sql)
    {
        return $this->exec($sql);
    }

    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    public function commit()
    {
        return $this->dbh->commit();
    }

    public function rollBack()
    {
        return $this->dbh->rollBack();
    }

    public function inTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
