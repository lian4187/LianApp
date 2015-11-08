<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;

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
        \LianApp\Lian\Logger::getLogger()->info(var_export($requestData, true));
        if (isset($requestData['echostr'])) {
            $responseArr = array(
                'echostr' => $requestData['echostr'],
            );
            $xmlStr = Xml::getXmlStr($responseArr);
            $xmlObj = Xml::parseXmlStr($xmlStr);
            return new Check($xmlObj);
        }

        $xmlStr = $requestData['HTTP_RAW_POST_DATA'];
        $xmlObj = simplexml_load_string($xmlStr);

        switch ($xmlObj->MsgType) {
            case 'event':
                return new Event($xmlObj);
                break;
            case 'text':
                return new Text($xmlObj);
                break;
            default:

                break;
        }
    }

}
