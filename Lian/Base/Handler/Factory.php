<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;
use LianApp\Lian\Logger;
use LianApp\Lian\Base\Configure;
use LianApp\Lian\Base\Tool\Prpcrypt;

/**
 * Class Factory
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Factory
{
    /**
     * undocumented function
     *
     * @return void
     */
    public static function getHandler($requestData)
    {
        Logger::getLogger()->info('requestData', var_export($requestData, true));
        if (isset($requestData['echostr'])) {
            $xmlArr = array(
                'xml' => array(
                    'echostr' => $requestData['echostr'],
                )
            );
            return new Check($xmlArr);
        }

        if ('aes' == strtolower($requestData['encrypt_type'])) {
            // TODO: 校验 msg_signature
            $xmlStr = $requestData['HTTP_RAW_POST_DATA'];
            $xmlArr = XML2Array::createArray($xmlStr);
            $xmlArr = self::removeCData($xmlArr);
            $encryptedMsg = $xmlArr['xml']['Encrypt'];
            $pc = new Prpcrypt(Configure::getKey());
            $decryptedMsg = $pc->decrypt($encryptedMsg, Configure::getAppid());
            $xmlArr = XML2Array::createArray($decryptedMsg);
            $xmlArr = self::removeCData($xmlArr);
        } else {
            // TODO:
            // exception
        }


        switch ($xmlArr['xml']['MsgType']) {
            case 'event':
                return new Event($xmlArr);
                break;
            case 'text':
                return new Text($xmlArr);
                break;
            default:

                break;
        }
    }

    /**
     * removeCData
     *
     * @return void
     */
    private static function removeCData(&$arr)
    {
        if (is_array($arr)) {
            if (isset($arr['@cdata'])) {
                return $arr['@cdata'];
            } else {
                foreach ($arr as $key => $value) {
                    $arr[$key] = self::removeCData($value);
                }
                return $arr;
            }
        } else {
            return $arr;
        }
    }

}
