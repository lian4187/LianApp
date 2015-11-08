<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;
use LianApp\Lian\Base\Tool\Curl;
use LianApp\Lian\Configure;
use LianApp\Lian\Base\Dao\Joke;

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
        //$content = '谢谢使用，你发送的消息为:' . $this->xmlObj->Content;
        $content = Joke::getOneJoke();

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
    }
}
