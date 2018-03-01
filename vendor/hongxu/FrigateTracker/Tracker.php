<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/1/24
 * Time: 16:01
 */

namespace FrigateTracker;

class Tracker
{

    /**
     * 跟踪器实例
     *
     * @var
     */
    protected static $tracker;

    /**
     * 上传路径
     * @var string
     */
    protected static $uploadApi = '';

    /**
     *
     *
     * @var string
     */
    protected static $secretToken = '';

    /**
     * @var array
     */
    protected static $config = [
        'token' => '',
    ];

    /**
     * Tracker constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        self::checkDependences();
//        self::checkConfig($config);
//        self::checkConfig($config);
    }

    /**
     * 支持两种开启方式：
     * 1、 GET请求参数：&_ftrack = 1
     * 2、 COOKIE携带：$_COOKIE['_ftrack'] = 1
     */
    public function start()
    {
        if (!isset($_COOKIE['_ftrack']) || $_COOKIE['_ftrack'] != 1) {
            return false;
        }

        if (!isset($_GET['_ftrack']) || $_GET['_ftrack'] != 1) {
            return false;
        }

    }

    /**
     *
     */
    public function stop()
    {

    }

    /**
     *
     */
    private static function checkDependences()
    {
        if (!function_exists('xdebug_start_trace')) {
            throw new \BadFunctionCallException('the xdebug_start_trace function not exit.Please install the xdebug extension.');
        }
    }

    /**
     * @param array $config
     */
    private static function checkConfig(array $config = [])
    {
        /* check the database config */


        throw new \RuntimeException();
    }

    /**
     *
     */
    private static function generateId()
    {
//        $id =
    }


}