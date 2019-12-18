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

use Hyperf\HttpServer\Contract\RequestInterface;

class IndexController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return 6;
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
