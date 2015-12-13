<?php

namespace LianApp\Lian\Base\Dao\DB;

/**
 * Class Proxy
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Proxy implements IDB
{
    private $dbh;

    /**
     * @param IDB $dbh
     */
    public function __construct(IDB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function connect($userName, $password, $host, $port)
    {
        $this->dbh->connect($userName, $password, $host, $port);
        //$result = $this->dbh->query('select * from wp.wp_posts');
        //var_dump($result->fetchAll());
    }

    public function query($sql)
    {
        return $this->dbh->query($sql);
    }

    public function select($sql)
    {
        return $this->dbh->select($sql);
    }

    public function insert($sql)
    {
        return $this->dbh->insert($sql);
    }

    public function update($sql)
    {
        return $this->dbh->update($sql);
    }

    public function delete($sql)
    {
        return $this->dbh->delete($sql);
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
        return $this->dbh->inTransaction();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
