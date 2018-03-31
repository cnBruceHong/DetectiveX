<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 01:56
 */

namespace DetectiveX\Core\Framework;


class Config
{
    private static $config = [];
    private static $isInit = false;

    /**
     * Configuration constructor.
     * @param array $configs
     */
    public function __construct(array $configs = [])
    {
        foreach ($configs as $configName => $config) {
            if ($configName == 'Services') {

            } else {

            }
        }
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
    }

    public function __isset($name)
    {
        return (bool)self::$isInit;
    }


}