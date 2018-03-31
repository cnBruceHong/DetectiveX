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
     * 应用初始化
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        // 检查容器中是否有应用需要的配置
        if (!($container['config'] instanceof Config)) {
            throw new \RuntimeException("the configurations of application is not injected into container");
        }

        $config = $container['config'];

    }


    public function run()
    {

    }
}