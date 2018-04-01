<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 01:56
 */

namespace DetectiveX\Core\Framework;


class Config implements \ArrayAccess, \Iterator
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
            switch ($configName) {
                case 'services':
                    /* 应用依赖的services将会在Application实例化运行时初始化 */
                    self::$config['services'] = $config;
                    break;

                case 'app':
                default:
                    foreach ($config as $k => $item) {
                        self::$config[$k] = $item;
                    }
                    break;
            }
        }

        self::$isInit = true;
    }

    public function __set($name, $value)
    {
        self::$config[$name] = $value;
    }

    public function __get($name)
    {
        return self::$config[$name];
    }

    public function __isset($name)
    {
        return (bool)self::$isInit;
    }


    public function offsetExists($offset)
    {
        return isset(self::$config[$offset]);
    }

    public function offsetGet($offset)
    {
        return self::$config[$offset];
    }

    public function offsetSet($offset, $value)
    {
        self::$config[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}