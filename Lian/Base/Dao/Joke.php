<?php

namespace LianApp\Lian\Base\Dao;

use LianApp\Lian\Base\Tool\Curl;
use LianApp\Lian\Configure;

/**
 * Class Joke
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Joke
{
    /**
     * getOneJoke
     *
     * @return string
     */
    public static function getOneJoke()
    {
        $pageNum = mt_rand(1, 10000);
        $url = 'http://apis.baidu.com/showapi_open_bus/showapi_joke/joke_text?page=' . $pageNum;
        $dataArr = array(
            'sendData' => 'apiKey:' . Configure::API_KEY,
        );
        $apiRes = Curl::send($url, $dataArr);
        $result = json_decode($apiRes, true);
        $jokeNum = mt_rand(0, 19);
        $oneJokeStr = $result['showapi_res_body']['contentlist'][$jokeNum]['text'];
        return $oneJokeStr;
    }
}
