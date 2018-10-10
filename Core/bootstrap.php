<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 00:51
 */
require_once __DIR__ . '/functions.php';

if (file_exists(__DIR__ . '/../Runtime/.dev')) {
    /* 开发环境，开启调试和错误输出 */
    ini_set('display_errors', '1');
    ini_set('error_log', __DIR__ . '/../Runtime/Log/php-fpm.log');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('error_log', __DIR__ . '/../Runtime/Log/php-fpm.log');
    error_reporting(~E_ALL);
}

$container = new \Pimple\Container();

/* 加载配置 */
$container['config'] = function () {
    return new \DetectiveX\Core\Framework\Config(
        require_once __DIR__ . '/../App/Config/web.php'
    );
};

/* 加载路由类 */
$container['route'] = function () {
    return new \DetectiveX\App\Service\Router(
        require_once __DIR__ . '/../App/Config/router.php'
    );
};

/* 注册助手类 */
$container['helper'] = function () {
    // TODO: 暂时没想好哪些是被需要的助手方法
};

/* 注册应用类 */
$container['app'] = function (\Pimple\Container $container) {
    return new \DetectiveX\Core\Framework\Application($container);
};

return $container;
