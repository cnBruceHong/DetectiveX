<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/9
 * Time: 22:55
 */

namespace DetectiveX\Core\Framework;


interface Session
{
    public function get();

    public function set();
}