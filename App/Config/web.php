<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/1/24
 * Time: 14:54
 */
return [

    /*
     * 系统全局配置
     * */
    'app' => [
        'host' => '',

        'database' => [
            'driver'    => 'mysql',
            'host'      => '',
            'port'      => '3306',
            'database'  => '',
            'username'  => '',
            'password'  => '',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => 'dx_',
        ]
    ],

    /*
     * services配置
     * 在项目启动的时候最注入容器
     * */
    'services' => [
        'upload'   => function () {
            return new \DetectiveX\App\Service\UploadService();
        },
        'pdo' => function () {
            return new \DetectiveX\App\Service\PDOService();
        },
    ]
];