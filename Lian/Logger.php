<?php

namespace LianApp\Lian;

/**
 * Class Logger
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Logger
{
    private static $logger;

    /**
     * single instance
     *
     * @return void
     */
    public static function getLogger()
    {
        if (self::$logger instanceof Logger) {
            return self::$logger;
        } else {
            self::$logger = new self();
        }
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }



    /**
     * info
     *
     * @return void
     */
    public function info($info)
    {
        $wInfo = "INFO____:\t" . $info;
        $this->writeIn($wInfo);
    }

    /**
     * warn
     *
     * @return void
     */
    public function warn($info)
    {
        $wInfo = "WARN____:\t" . $info;
        $this->writeIn($wInfo);
    }


    /**
     * write function
     *
     * @return void
     */
    protected function writeIn($info)
    {
        file_put_contents(Configure::LOG_FILE, $info, FILE_APPEND);
    }

}
