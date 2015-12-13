<?php

namespace LianApp\Lian;

/**
 * Class Configure
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Configure
{
    //public static $LOG_FILE = '/home/lian/var/LianApp.log';
    const LOG_FILE = '/tmp/LianApp.log';

    const CURL_TYPE_GET = 1;
    const CURL_TYPE_POST = 2;

    const API_KEY = '3caa834e73b1fb76999298f4f1495217';

    // db config
    const DB_HOST = '127.0.0.1';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'lian4187';
    const DB_PORT = '3306';
}
