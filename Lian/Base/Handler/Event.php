<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;
use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;

/**
 * Class Event
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Event extends BaseHandler
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
        if ($this->xmlArr['xml']['Event'] == 'subscribe') {
            $content = 'Hello 欢迎关注：奔跑的小羊，目前处于测试阶段';
            $responseArr = array(
                'ToUserName' => array('@cdata' => $this->xmlArr['xml']['FromUserName']),
                'FromUserName' => array('@cdata' => $this->xmlArr['xml']['ToUserName']),
                'CreateTime' => time(),
                'MsgType' => array('@cdata' => 'text'),
                'Content' => array('@cdata' => $content),
            );
            $xmlStr = Array2XML::createXML('xml', $responseArr);

            $this->logger->info($xmlStr);
            return $xmlStr;
        } else {
            // TODO
            return null;
        }
    }

}
