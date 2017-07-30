<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 16:09
 */

namespace code\lib;

/**
 * 加载配置文件
 * @package code\lib
 */
class conf
{
    public static $conf = [];
    public static function get($name, $file){
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else {
            $conf = CODE."config\\" . $file . EXT;
            if (is_file($conf)) {
                $conf = include $conf;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception("没有这个配置项" . $name);
                }
            } else {
                throw new \Exception("找不到配置项文件。" . $file);
            }
        }
    }
    public static function getAll($file){
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        }else {
            $conf = CODE."config\\" . $file . EXT;
            if (is_file($conf)) {
                $conf = include $conf;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception("找不到配置项文件。" . $file);
            }
        }
    }
}