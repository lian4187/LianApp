<?php

namespace LianApp\Lian\Base;

/**
 * Class Checker
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Checker
{
    /**
     * checker
     * 用户检查微信验证微信返回的数据
     * @return bool
     */
    public function check($requestData)
    {
        $signature = $requestData["signature"];
        $timestamp = $requestData["timestamp"];
        $nonce = $requestData["nonce"];

        $token = Configer::$TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        } else {
            return false;
        }
    }
}
