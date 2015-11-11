<?php

namespace LianApp\Lian\Base\Handler;

/**
 * Class Check
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Check extends BaseHandler
{
    /**
     * @param mixed $xmlArr
     */
    public function __construct($xmlArr)
    {
        parent::__construct($xmlArr);
    }

    /**
     * 事件处理器
     *
     * @return void
     */
    public function handle()
    {
        return $this->xmlArr['xml']['echostr'];
    }
}
