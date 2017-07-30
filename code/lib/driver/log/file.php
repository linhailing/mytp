<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 17:51
 */

namespace code\lib\driver\log;
use code\lib\conf;
/***
 * 日志的储存方式
 * @package code\lib\driver\file
 */
class file
{
    public $path;
    public function __construct()
    {
        $conf =  conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }
    public function log($message, $file){
        /**
         * 1, 判断文件是否存在
         * 2，写入文件
         */
        $path = $this->path.date('YmdH');
        // 判断文件是否存在
        if (!is_dir($path)){
            mkdir($path,"0777");
        }
        $time = date("Y-m-d H:i:s");
        file_put_contents($path.DS.$file, $time."  ".json_encode($message).PHP_EOL, FILE_APPEND);
    }
}