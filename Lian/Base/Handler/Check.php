<?php

namespace LianApp\Lian\Base\Handler;

/**
 * Class Check
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Check extends BaseHandler
{
    /**
     * @param mixed $xmlObj
     */
    public function __construct($xmlObj)
    {
        parent::__construct($xmlObj);
    }

    /**
     * 事件处理器
     *
     * @return void
     */
    public function handle()
    {
        return $xmlObj->echostr;
    }
}
