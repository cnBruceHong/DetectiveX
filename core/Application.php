<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/1/23
 * Time: 14:02
 */
namespace Frigate;

class Application
{
    static private $app = null;

    public static function run(array $config = [])
    {
        if (!empty(Application::$app)) {
            return Application::$app;
        }


    }

    public function set()
    {

    }


}