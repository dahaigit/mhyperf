<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\JsonRpc\CalculatorServiceInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\RateLimit\Annotation\RateLimit;
use Hyperf\Utils\ApplicationContext;

class IndexController extends AbstractController
{
    /**
     * @RateLimit(create=1, capacity=3)
     */
    public function index(RequestInterface $request)
    {
        return $this->rpcAdd($request);
    }

    /**
     * Notes: jsonrpc计算加法
     * User: mhl
     */
    public function rpcAdd($request)
    {
        $client = ApplicationContext::getContainer()->get(CalculatorServiceInterface::class);
        $result = $client->add(10, 12);
        return $result;
    }

    /**
     * Notes: 上传图片
     * User: mhl
     * @param RequestInterface $request
     * @return string
     */
    public function uploadFile(RequestInterface $request)
    {
        $savePath = BASE_PATH . '/upload/images/';
        if (!is_dir($savePath)) {
            mkdir($savePath, 0777, true);
        }
        $fileName = rand(1000, 999) . '.' . $request->file('file')->getExtension();
        $request->file('file')->moveTo($savePath . $fileName);
        return 'ok';
    }


}
