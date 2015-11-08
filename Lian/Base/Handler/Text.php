<?php

namespace LianApp\Lian\Base\Handler;

/**
 * Class Text
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Text extends BaseHandler
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
            $content = '谢谢使用，你发送的消息为:' . $xmlObj->Content;
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
            return null;
        }
    }

}
