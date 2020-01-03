<?php

namespace App\JsonRpc;

use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;
use Hyperf\RpcClient\AbstractServiceClient;

class CalculatorServiceConsumer extends AbstractServiceClient implements CalculatorServiceInterface
{
    /**
     * 定义对应服务提供者的服务名称
     * @var string
     */
    protected $serviceName = 'CalculatorService';

    /**
     * 定义对应服务提供者的服务协议
     * @var string
     */
    protected $protocol = 'jsonrpc';

    /**
     * 这里我们使用注解，设置了add函数的降级函数。
     * @CircuitBreaker(timeout=1, failCounter=1, successCounter=1, fallback="App\JsonRpc\CalculatorServiceConsumer::addFillCallback")
     */
    public function add(int $a, int $b)
    {
        return $this->__request(__FUNCTION__, compact('a', 'b'));
    }

    /**
     * Notes: 降级函数
     * User: mhl
     * @return int
     */
    public function addFillCallback(int $a, int $b)
    {
        echo "降级函数执行了";
        return 0;
    }
}