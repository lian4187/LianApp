<?php

namespace LianApp\Lian;

/**
 * Class Loader
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Loader
{
    /**
     * autoload
     *
     * @return void
     */
    public static function autoload($class)
    {
        require BASE_DIR . str_replace('\\', '/', substr($class, strlen(BASE_NAMESPACE))) . '.php';
    }

}
