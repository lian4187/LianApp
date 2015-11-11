<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Base\Tool\Xml;
use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;

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
            $xmlArr = array(
                'xml' => array(
                    'echostr' => $requestData['echostr'],
                )
            );
            return new Check($xmlArr);
        }

        $xmlStr = $requestData['HTTP_RAW_POST_DATA'];
        $xmlArr = XML2Array::createArray($xmlStr);
        $xmlArr = self::removeCData($xmlArr);

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
                    $arr[$key] = $this->removeCData($value);
                }
                return $arr;
            }
        } else {
            return $arr;
        }
    }

}
