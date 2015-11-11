<?php

namespace LianApp\Lian\Base\Builder;

/**
 * Class Text
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Text
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
        $responseArr = array(
            'ToUserName' => array('@cdata' => $this->fromUserName),
            'FromUserName' => array('@cdata' => $this->toUserName),
            'CreateTime' => $this->createTime,
            'MsgType' => array('@cdata' => $this->msgType),
            'Content' => array('@cdata' => $this->content),
        );
        return Array2XML::createXML('xml', $responseArr)->saveXML();
    }
}
