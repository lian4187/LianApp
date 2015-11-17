<?php

namespace LianApp\App\Controller\Home;

use LianApp\Lian\Base\Checker;
use LianApp\Lian\Base\Handler\Factory as HandlerFactory;

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

        // TODO:
        // Exception

        // 1. check
        $checker = new Checker();
        $checkRes = $checker->check($requestData);

        // 2. 业务逻辑处理
        if ($checkRes) {
            if (isset($GLOBALS['HTTP_RAW_POST_DATA'])) {
                $requestData['HTTP_RAW_POST_DATA'] = $GLOBALS['HTTP_RAW_POST_DATA'];
            }
            $handler = HandlerFactory::getHandler($requestData);
            $responseStr = $handler->handle();
            echo $responseStr;
            exit;
        } else {
            echo 'error!';
            exit;
        }
    }

}
