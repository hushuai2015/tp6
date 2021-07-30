<?php
namespace hs\rabbitmq;
use PhpAmqpLib\Message\AMQPMessage;
use think\Exception;
use think\facade\Log;

/**
 * 生产者
 * Class Producer
 * @package hs\rabbitmq
 */
class Producer extends RabbitBase
{

    /**
     * 生产者生产消息
     * @param array $param
     * @param string $key
     * @return bool
     */
    public function publish(array $param, string $key): bool
    {
        try {

            //建立通道
            $channel = $this->connection->channel();

            //初始化交换机
            $channel->exchange_declare($this->topic['exchange_name'], $this->topic['exchange_type'], false, true, false);

            //生成消息
            $msg = new AMQPMessage(json_encode($param), [
                'content-type'  => 'application/json',
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]);

            //推送消息到某个交换机
            $channel->basic_publish($msg, $this->topic['exchange_name'],  $key . '.queue');

            $channel->close();
            $this->connection->close();
            return true;
        }catch (Exception $exception){
            Log::error('Producer.Exception:'.$exception->getMessage());
            return false;
        }

    }
    
}
