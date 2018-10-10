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
    'app'      => [

        /*
         * 站点URL
         * */
        'url'      => 'https://debug.bruceit.com',

        /*
         * 站点名称
         * */
        'name'     => 'DetectiveX - A Tool for PHP Debug Online',

        /*
         * 是否开启调试模式
         * */
        'debug'    => true,

        /*
         * 应用的时区
         * */
        'timezone' => 'PRC',

        /*
         * 加密用的Key，这里只是演示，请在生产环境自行生成
         * */
        'key'      => 'RcN/4.3R^W{249H=J9o(CKzy',

        'cipher'   => 'AES-256-CBC',

    ],

    /*
     * services配置
     * 在项目启动的时候注入容器
     * */
    'services' => [
        'pdo'    => \DetectiveX\App\Service\PDOService::class,
        'log'    => function () {
            $log = new \Monolog\Logger(config('name'));
            $log->pushHandler(
                new Monolog\Handler\StreamHandler(
                    __DIR__ . '/../../Runtime/Log/application.log',
                    \Monolog\Logger::WARNING)
            );
            return $log;
        },
        'upload' => \DetectiveX\App\Service\APIService::class,
    ]
];