<?php

namespace LianApp\Lian\Base\Handler;

use LianApp\Lian\Logger;

/**
 * Class BaseHandle
 * @author lian <lianxiaoyang.happy@163.com>
 */
abstract class BaseHandler implements IHandle
{
    protected $logger;
    protected $xmlArr;

    public function __construct($xmlArr)
    {
        $this->logger = Logger::getLogger();
        $this->xmlArr = $this->removeCData($xmlArr);
    }

    /**
     * removeCData
     *
     * @return void
     */
    private function removeCData(&$arr)
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
