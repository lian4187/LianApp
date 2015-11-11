<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;
use LianApp\Lian\Base\Tool\Curl;
use LianApp\Lian\Configure;
use LianApp\Lian\Base\Dao\Joke;
use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;

/**
 * Class Text
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Text extends BaseHandler
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
        //$content = '谢谢使用，你发送的消息为:' . $this->xmlArr->Content;
        $content = Joke::getOneTextJoke();

        $responseArr = array(
            'ToUserName' => array('@cdata' => $this->xmlArr['xml']['FromUserName']),
            'FromUserName' => array('@cdata' => $this->xmlArr['xml']['ToUserName']),
            'CreateTime' => time(),
            'MsgType' => array('@cdata' => 'text'),
            'Content' => array('@cdata' => $content),
        );
        $xmlStr = Array2XML::createXML('xml', $responseArr);

        $this->logger->info(var_export($xmlStr, true));
        return $xmlStr;
    }
}
