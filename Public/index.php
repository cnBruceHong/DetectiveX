<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/1/23
 * Time: 12:29
 */

require_once __DIR__ . '/../vendor/autoload.php';

/*
 * 创建容器
 * */
$container = require_once __DIR__ . '/../Core/bootstrap.php';

/*
 * 应用启动
 * */
$container['app']::run();
