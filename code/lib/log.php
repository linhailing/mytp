<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 17:54
 */

namespace code\lib;
use code\lib\conf;

class log
{
    static public $class;
    public function __construct()
    {

    }

    public static function init(){
        $className = '\code\lib\driver\log\\'.conf::get('DRIVER', 'log');
        self::$class = new $className;
    }
    public static function  log($message, $file='log'){
        self::$class->log($message, $file);
    }
}