<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Curl;
use LianApp\Lian\Configure;
use LianApp\Lian\Base\Dao\Joke;
use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;
use LianApp\Lian\Base\Builder\Text as TextBuilder;

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

        $textBuilder = new TextBuilder(
            $this->xmlArr['xml']['FromUserName'],
            $this->xmlArr['xml']['ToUserName'],
            $content
        );

        $xmlStr = $textBuilder->build();

        $this->logger->info('返回xml', var_export($xmlStr, true));
        return $xmlStr;
    }
}
