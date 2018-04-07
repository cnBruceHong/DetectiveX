<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/1/23
 * Time: 14:02
 */

namespace DetectiveX\Core\Framework;

use Pimple\Container;

/**
 * 全局应用单例
 *
 * @package DetectiveX\Core\Framework
 */
class Application
{
    /**
     * 应用内容器
     *
     * @var null
     */
    protected static $container = null;

    /**
     * 应用初始化
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        // 检查容器中是否有应用需要的配置
        if (!($container['config'] instanceof Config) || !isset($container['config'])) {
            throw new \RuntimeException("the configurations of application is not injected into container");
        }

        /* 加载各个服务组件 */
        if (!empty($container['config']['services'])) {
            /* 初始化应用的容器 */
            foreach ($container['config']['services'] as $facade => $closure) {
                if ($closure instanceof \Closure) {
                    $container[$facade] = $closure;
                } elseif (class_exists($closure)) {
                    $container[$facade] = function () use ($closure) {
                        return new $closure();
                    };
                }
            }
        }

        register_shutdown_function(self::shutdown());
        set_exception_handler([self::class, 'exceptionHandler']);

        self::$container = $container;
    }

    /**
     * 获取服务组件
     *
     * @param string $component
     * @return null
     */
    public static function app($component = 'app')
    {
        return self::$container[$component];
    }


    /**
     * 启动应用
     */
    public static function run()
    {
        try {
            self::$container['route']->run();
        } catch (\Exception $exception) {
            if (isset(self::$container['log'])) {
                self::$container['log']->error($exception->getMessage());
            }
            header("", false, 500);
        }
    }

    /**
     * 应用关闭处理
     */
    private static function shutdown()
    {
        return function () {
            // TODO: 关闭应用的处理
        };
    }

    /**
     * 错误接管
     */
    private static function exceptionHandler()
    {
        if (!headers_sent()) {
            header("", false, 500);
        }
    }
}