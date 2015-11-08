<?php

namespace LianApp\Lian\Base\Tool;

use LianApp\Lian\Configure;

/**
 * Class Curl
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Curl
{
    /**
     * send
     *
     * @param string $url
     * @param array $dataArr
     *      array(
     *          'sendData' => dataStr,
     *          'curlOpt'  => array( ... ),
     *      )
     * @param bool $type
     * @static
     * @access public
     * @return void
     */
    public static function send($url, $dataArr, $type = Configure::CURL_TYPE_GET)
    {
        $ch = curl_init();

        if (Configure::CURL_TYPE_GET == $type) {
            $header = array(
                $dataArr['sendData'],
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        } else {
            $sendData = $dataArr['sendData'];
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        return $res;
    }

}
