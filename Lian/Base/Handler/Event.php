<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;

/**
 * Class Event
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Event extends BaseHandler
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
        if ($this->xmlObj->Event == 'subscribe') {
            $content = 'Hello 欢迎关注：奔跑的小羊，目前处于测试阶段';
            $responseArr = array(
                'ToUserName' => $this->xmlObj->FromUserName,
                'FromUserName' => $this->xmlObj->ToUserName,
                'CreateTime' => time(),
                'MsgType' => 'text',
                'Content' => $content,
            );
            $xmlStr = Xml::getXmlStr($responseArr);

            $this->logger->info($xmlStr);
            return $xmlStr;
        } else {
            // TODO
            return null;
        }
    }

}
