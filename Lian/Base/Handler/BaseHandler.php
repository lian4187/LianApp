<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Logger;

/**
 * Class BaseHandle
 * @author lian <lianxiaoyang.happy@163.com>
 */
abstract class BaseHandler implements IHandle
{
    protected $logger;
    protected $xmlArr;

    public function __construct($xmlArr)
    {
        $this->logger = Logger::getLogger();
        $this->xmlArr = $xmlArr;
    }

}
