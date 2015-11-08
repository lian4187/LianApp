<?php

namespace LianApp\Lian\Base\Tool;

/**
 * Class Xml
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Xml
{
    /**
     * undocumented function
     *
     * @return void
     */
    public static function getXmlStr($arr)
    {
        $xmlStr = '<xml>';
        foreach ($arr as $key => $value) {
            $xmlStr .= '<' . $key . '><![CDATA[' . $value . ']]></' . $key . '>';
        }
        $xmlStr .= '</xml>';
        return $xmlStr;
    }

    /**
     * parseXmlStr
     *
     * @return xmlObj
     */
    public static function parseXmlStr($xmlStr)
    {
        $xmlObj = simplexml_load_string($xmlStr);
        return $xmlObj;
    }

}
