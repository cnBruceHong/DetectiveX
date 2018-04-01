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

        if (!empty($container['config']['services'])) {
            /* 初始化应用的容器 */
            foreach ($container['config']['services'] as $facade => $closure) {
                if ($closure instanceof \Closure) {
                    $container[$facade] = $closure;
                }
                // TODO: 不是闭包的类实例化
            }
        }

        self::$container = $container;
    }

    /**
     *
     *
     * @param string $component
     * @return null
     */
    public static function app($component = 'app')
    {
        if () {

        }

        return self::$container[$component];
    }


    /**
     *
     */
    public static function run()
    {

    }
}