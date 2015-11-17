<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;
use LianApp\Lian\Base\Builder\Text as TextBuilder;
use LianApp\Lian\Base\Builder\Encrypt as EncryptBuilder;
use LianApp\Lian\Base\Configure;
use LianApp\Lian\Base\Checker;

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

            $textBuilder = new TextBuilder(
                $this->xmlArr['xml']['FromUserName'],
                $this->xmlArr['xml']['ToUserName'],
                $content
            );

            $xmlStr = $textBuilder->build();

            $pc = new Prpcrypt(Configure::$ENCODING_AES_KEY);
            $encryptedMsg = $pc->encrypt($xmlStr, Configure::$APPID);

            $timestamp = time();
            $nonce = time();

            $checker = new Checker();
            $msgSignature = $checker->getSignedMsg(array(
                'msg_encrypt' => $encryptedMsg,
                'timestamp' => $timestamp,
                'nonce' => $nonce,
            ));

            $encryptBuilder = new EncryptBuilder($encrypt, $msgSignature, $timestamp, $nonce);
            $xmlStr = $encryptBuilder->build();

            $this->logger->info('返回xml', var_export($xmlStr, true));
            return $xmlStr;
        } else {
            // TODO
            return null;
        }
    }

}
