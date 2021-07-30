<?php



return [

    /**
     * 连接信息
     */
    'connect'  => [
        'host'     => '127.0.0.1',
        'port'     => '5672',
        'username' => 'admin',
        'password' => '123456',
        'vhost'    => '/'
    ],
    'topic'  => [
        'exchange_name' => 'topic_exchange',
        'exchange_type' => 'topic',
        'queue_name'    => 'topic_queue',
        'route_key'     => '',
        'consumer_tag'  => 'topic'
    ],
    'queue' => [
        'sms_send' => [
            'queue_name'    => 'sms_send_queue',
            'route_key'     => 'sms_send.#',
            'consumer_tag'  => 'sms_send',
            'class_name'    => \mq\SmsSend::class,
            'no_ack'        => false  /* 是否自动确认消费【true是|false否】 */
        ]

    ]

];
