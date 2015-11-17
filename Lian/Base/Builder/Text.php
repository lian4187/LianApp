<?php

namespace LianApp\Lian\Base\Builder;

use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;

/**
 * Class Text
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Text extends Common
{
    protected $content;

    /**
     * @param mixed $toUserName
     * @param mixed $fromUserName
     * @param mixed $content
     */
    public function __construct($fromUserName, $toUserName, $content)
    {
        $this->content = $content;
        parent::__construct($fromUserName, $toUserName, 'text', time());
    }


    /**
     * undocumented function
     *
     * @return void
     */
    public function build()
    {
        Array2XML::init('1.0', 'UTF-8', false);
        $responseArr = array(
            'ToUserName' => array('@cdata' => $this->fromUserName),
            'FromUserName' => array('@cdata' => $this->toUserName),
            'CreateTime' => $this->createTime,
            'MsgType' => array('@cdata' => $this->msgType),
            'Content' => array('@cdata' => $this->content),
        );
        $xml = Array2XML::createXML('xml', $responseArr);
        return $xml->saveXML($xml->documentElement);
    }
}
