<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;
use LianApp\Lian\Base\Tool\Curl;
use LianApp\Lian\Configure;

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
        $pageNum = rand(1, 10000);
        $url = 'http://apis.baidu.com/hihelpsme/chinajoke/getjokelist?page=' . $pageNum;
        $dataArr = array(
            'sendData' => 'apiKey:' . Configure::API_KEY,
        );
        $apiRes = Curl::send($url, $dataArr);
        $result = json_decode($apiRes, true);
        $jokeNum = rand(0, 19);
        $res = $result['res_body']['JokeList'][$jokeNum]['JokeContent'];
        //$content = '谢谢使用，你发送的消息为:' . $this->xmlObj->Content;
        $content = $res;

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
