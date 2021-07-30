<?php
declare (strict_types = 1);

namespace app\command;
use hs\rabbitmq\facade\RabbitFacade;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class RabbitSmsSend extends Command
{

    protected function configure()
    {
        // 指令配置
        $this->setName('rabbitSmsSend')
            ->setDescription('消费队列【rabbitSmsSend】 ');
    }

    protected function execute(Input $input, Output $output)
    {

        RabbitFacade::consumer('sms_send');
    }

}
