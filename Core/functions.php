<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 22:32
 *
 * @param string $components
 * @return null
 */

function app($components = 'app')
{
    return \DetectiveX\Core\Framework\Application::app($components);
}

/**
 * 获取配置项
 *
 * @param string $name
 * @param string $default
 * @return string
 */
function config($name = '', $default = '')
{
    return isset(app('config')[$name]) ? app('config')[$name] : $default;
}

/**
 * 获取 Session 驱动
 *
 * @param string $name
 * @return null
 */
function session($name = '')
{
    return app('session');
}