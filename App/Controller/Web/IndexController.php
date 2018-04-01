<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 00:52
 */

namespace DetectiveX\App\controller;

use DetectiveX\Core\Framework\Helper;

class IndexController
{
    public function index()
    {
        $ip = $container['helper']::get_client_ip();
    }
}