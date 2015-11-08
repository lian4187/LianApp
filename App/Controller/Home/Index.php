<?php

namespace LianApp\App\Controller\Home;

use LianApp\Lian\Base\Checker;

/**
 * Class Index
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Index
{
    /**
     * index
     *
     * @return void
     */
    public static function index()
    {
        $requestData = $_GET;

        // 1. check
        $checker = new Checker();
        $checkRes = $checker->check($requestData);

        // 2. 业务逻辑处理
        if ($checkRes) {
            //$echoStr = $requestData["echostr"];
            //echo $echoStr;
            echo 'OK!';
            exit;
        } else {
            echo 'error!';
        }
    }

}
