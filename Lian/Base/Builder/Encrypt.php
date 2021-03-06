<?php

namespace LianApp\Lian\Base\Builder;

use LianApp\Lian\Base\Tool\Array2XML;
use LianApp\Lian\Base\Tool\XML2Array;

/**
 * Class Encrypt
 * @author lian <lianxiaoyang.happy@163.com>
 */
class Encrypt
{
    /**
     * @param mixed $encrypt
     * @param mixed $msgSignature
     * @param mixed $timestamp
     * @param mixed $nonce
     */
    public function __construct($encrypt, $msgSignature, $timestamp, $nonce)
    {
        $this->encrypt = $encrypt;
        $this->msgSignature = $msgSignature;
        $this->timestamp = $timestamp;
        $this->nonce = $nonce;
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function build()
    {
        Array2XML::init('1.0', 'UTF-8', false);
        $responseArr = array(
            'Encrypt' => array('@cdata' => $this->encrypt),
            'MsgSignature' => array('@cdata' => $this->msgSignature),
            'TimeStamp' => $this->timestamp,
            'Nonce' => array('@cdata' => $this->nonce),
        );
        $xml = Array2XML::createXML('xml', $responseArr);
        return $xml->saveXML($xml->documentElement);
    }
}
