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
        // 如何请求
        /*
         * 请求地址：192.168.10.10:9503
         * 请求内容：{
                        "jsonrpc": "2.0",
                        "method": "dahai/add",
                        "params": [
                            2,
                            2
                        ],
                        "id": ""
                    }
         *
         * */
         return $a + $b;
    }
}














