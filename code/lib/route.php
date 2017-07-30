<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 13:10
 */

namespace code\lib;
use code\lib\conf;
/***
 * 路由方法
 * @package code
 */
class route
{
    public $contr = "";
    public $action = "";
    public function __construct()
    {
        // xxx.com/index.php/index/index
        /***
         * 1,隐藏index.php
         * 2，获取参数部分
         * 3，返回对应控制器和方法
         */
        //判断是否存在并且 ！='/'
        if(isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] != '/'){
            $path = $_SERVER['REDIRECT_URL'];
            //删除第一个/
            $path = trim($path, "/");
            //分割字符串为数字
            $patharr = explode('/', $path);
            if(isset($patharr[0])){
                $this->contr = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->action = $patharr[1];
                unset($patharr[1]);
            }else {
                $this->action = conf::get('ACTION', 'route');
            }
            //url多余的字符串转换为GET
            $i = 2;
            $count = count($patharr) + 2;
            while($i < $count) {
                if (isset($patharr[$i + 1])) {
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i += 2;
            }
        }else{
            $this->contr = conf::get("CONTRO", 'route');
            $this->action = conf::get('ACTION', 'route');
        }
    }
}










