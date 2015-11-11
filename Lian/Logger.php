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
        if (!(self::$logger instanceof Logger)) {
            self::$logger = new self();
        }
        return self::$logger;
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
    public function info($title, $info)
    {
        $wInfo = "INFO____:\t" . $title . "\t" . $info;
        $this->writeIn($wInfo);
    }

    /**
     * warn
     *
     * @return void
     */
    public function warn($title, $info)
    {
        $wInfo = "WARN____:\t" . $title . "\t" . $info;
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
