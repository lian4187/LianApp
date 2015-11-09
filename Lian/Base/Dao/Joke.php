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
        $pageNum = mt_rand(1, 100000);
        $url = 'http://apis.baidu.com/hihelpsme/chinajoke/getjokelist?page=' . $pageNum;
        $dataArr = array(
            'sendData' => 'apiKey:' . Configure::API_KEY,
        );
        $apiRes = Curl::send($url, $dataArr);
        $result = json_decode($apiRes, true);
        $jokeNum = rand(0, 19);
        $oneJokeStr = $result['res_body']['JokeList'][$jokeNum]['JokeContent'];
        return $oneJokeStr;
    }
}
