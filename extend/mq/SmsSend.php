<?php


namespace mq;

use hs\rabbitmq\ConsumerHandler;

class SmsSend
{
    use ConsumerHandler;


    /**
     * @param array $param
     * @param int $count 执行次数
     * @return bool
     */
    public function test(array $param,int $count): bool
    {
        $data = $this->init($param);
        echo json_encode($data) . "\n" ;
        sleep(1);
        return $this->complete();
    }
    
}