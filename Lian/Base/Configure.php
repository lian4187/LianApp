<?php

namespace LianApp\Lian\Base;

/**
 * Class Configure
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Configure
{
    public static $TOKEN = 'lian_weixin_4187';
    public static $ENCODING_AES_KEY = 'rXfMgjJeD9t0ROl3m1POw4JgsLh02o8m6wVFIJtgmRf';
    public static $APPID = 'wx044d9551b32d2a42';

    /**
     * getToken
     *
     * @return void
     */
    public static function getToken()
    {
        return self::$TOKEN;
    }

    /**
     * getKey
     *
     * @return void
     */
    public static function getKey()
    {
        return base64_decode(self::$ENCODING_AES_KEY . '=');
    }

    /**
     * getAppid
     *
     * @return void
     */
    public static function getAppid()
    {
        return self::$APPID;
    }
}
