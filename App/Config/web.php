<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/1/24
 * Time: 14:54
 */
return [

    'Services' => [
        'upload'   => function () {
            return new \DetectiveX\App\Service\UploadService();
        },
        'database' => 'DatabaseService',
    ]
];