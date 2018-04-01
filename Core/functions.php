<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 22:32
 * @param string $components
 * @return null
 */

function app($components = 'app') {
    return \DetectiveX\Core\Framework\Application::app($components);
}

function config($name = '', $default = '') {
    return isset(app('config')[$name]) ? app('config')[$name] : $default;
}