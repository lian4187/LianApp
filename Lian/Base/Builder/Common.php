<?php

namespace LianApp\Lian\Base\Builder;

/**
 * Class Common
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Common
{
    protected $fromUserName;
    protected $toUserName;
    protected $msgType;
    protected $createTime;

    /**
     * @param string $fromUserName
     * @param string $toUserName
     * @param string $msgType
     * @param string $createTime
     */
    public function __construct($fromUserName, $toUserName, $msgType, $createTime)
    {
        $this->fromUserName = $fromUserName;
        $this->toUserName = $toUserName;
        $this->msgType = $msgType;
        $this->createTime = $createTime;
    }

}
