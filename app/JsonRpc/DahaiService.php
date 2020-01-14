<?php
declare(strict_types=1);

namespace App\JsonRpc;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * @RpcService(name="DahaiService", protocol="jsonrpc-http", server="jsonrpc-http")
 */
class DahaiService implements CalculatorServiceInterface
{
    public function add($a, $b) {
         return $a + $b;
    }
}














