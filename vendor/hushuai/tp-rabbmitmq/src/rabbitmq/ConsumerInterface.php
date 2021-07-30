<?php

namespace hs\rabbitmq;


/**
 * 
 * Interface ConsumerInterface
 * @package hs\rabbitmq
 */
interface ConsumerInterface
{

    /**
     * @param array $msg  消息内容
     * @param int $retry   重试次数
     * @return bool
     */
    public function job(array $msg,int $retry) :bool ;




}