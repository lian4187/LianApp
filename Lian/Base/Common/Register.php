<?php

namespace LianApp\Lian\Base\Common;

/**
 * Class Register
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Register
{
    private static $objects;

    /**
     * set
     *
     * @return void
     */
    public static function set($name, $object)
    {
        self::$objects[$name] = $object;
    }

    /**
     * get
     *
     * @return void
     */
    public static function get($name)
    {
        return self::$objects[$name];
    }

}
