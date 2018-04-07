<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 04:24
 */

namespace DetectiveX\App\Controller\Web;


use DetectiveX\App\controller\Auth;

class DashboardController extends Auth
{
    public function index()
    {
        throw new \Exception('Test your log');
        var_dump('index');die;
    }
}