<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/6
 * Time: 23:25
 */

namespace DetectiveX\App\Service;


class Router extends \Bramus\Router\Router
{

    /**
     * Router constructor.
     * @param array $routes
     */
    public function __construct(array $routes = [])
    {
        $this->set404(function () {
            header("", true, 404);
        });

        $this->setNamespace('DetectiveX\App\Controller');

        foreach ($routes as $method => $route) {
            switch ($method) {
                case 'GET':
                    if (is_array($route)) {
                        foreach ($route as $pattern => $dealer) {
                            $this->get($pattern, $dealer);
                        }
                    }
                    break;
                case 'POST':
                    if (is_array($route)) {
                        foreach ($route as $pattern => $dealer) {
                            $this->post($pattern, $dealer);
                        }
                    }
                    break;
                case 'ALL':
                default:
                    if (is_array($route)) {
                        foreach ($route as $pattern => $dealer) {
                            $this->all($pattern, $dealer);
                        }
                    }
                    break;
            }
        }
    }
}