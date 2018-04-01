<?php
/**
 * Created by PhpStorm.
 * User: hongxu
 * Date: 2018/4/1
 * Time: 04:25
 */

namespace DetectiveX\Core\Framework;


/**
 * 助手类
 * @package DetectiveX\Core\Framework
 */
class Helper
{
    public static function get_client_ip()
    {
        static $realip = NULL;

        if ($realip !== NULL) {
            return $realip;
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR2'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR2']);
            /* 取X-Forwarded-For2中第?个非unknown的有效IP字符? */
            foreach ($arr as $ip) {
                $ip = trim($ip);
                if ($ip != 'unknown') {
                    $realip = $ip;
                    break;
                }
            }
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            /* 取X-Forwarded-For中第?个非unknown的有效IP字符? */
            foreach ($arr as $ip) {
                $ip = trim($ip);
                if ($ip != 'unknown') {
                    $realip = $ip;
                    break;
                }
            }
        } else if (isset($_SERVER['HTTP_X_REAL_IP'])) {
            $realip = $_SERVER['HTTP_X_REAL_IP'];
        } else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            if (isset($_SERVER['REMOTE_ADDR'])) {
                $realip = $_SERVER['REMOTE_ADDR'];
            } else {
                $realip = '0.0.0.0';
            }
        }

        preg_match("/[\d\.]{7,15}/", $realip, $m);
        $realip = !empty($m[0]) ? $m[0] : '0.0.0.0';

        return $realip;
    }
}