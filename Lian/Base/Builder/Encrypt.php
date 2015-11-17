<?php

namespace LianApp\Lian\Base\Builder;

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
        $responseArr = array(
            'Encrypt' => array('@cdata' => $this->encrypt),
            'MsgSignature' => array('@cdata' => $this->msgSignature),
            'TimeStamp' => $this->timestamp,
            'Nonce' => array('@cdata' => $this->nonce),
        );
        return Array2XML::createXML('xml', $responseArr)->saveXML();
    }
}
