<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 00:51
 */

ini_set('display_errors', '1');
ini_set('error_log', __DIR__ . '/../Runtime/Log/php-fpm.log');
error_reporting(E_ALL);

$container = new \Pimple\Container();

$container['config'] = function () {
    return new \DetectiveX\Core\Framework\Config(require_once __DIR__ . '/../App/Config/web.php');
};

$container['app'] = function (\Pimple\Container $container) {
    return new \DetectiveX\Core\Framework\Application($container);
};

return $container;

