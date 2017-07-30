<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 12:59
 */
namespace code;
class tp{
    public static $classMap = [];
    public $assgin = [];
    /**
     * 程序启动方法
     */
    public static function run(){
        //日志的初始化
        \code\lib\log::init();
        $route = new \code\lib\route();
        $controllerName = ucfirst($route->contr);
        $action = ucfirst($route->action);
        $fileName = APP."controllers".DS.$controllerName."Controller".EXT;
        if(is_file($fileName)){
            include $fileName;
            $includPath = '\\'.MODULE."\controllers\\".$controllerName."Controller";
            $ctro = new $includPath;
            $ctro->$action();
            $message = "controller: ".$controllerName."   action: ". $action;
            \code\lib\log::log($message);
        }else{
            throw new \Exception('找不到控制器 '.$fileName);
        }
    }

    /***
     * 函数自动加载类库文件
     */
    public static function load($class){
        /***
         * 如果没有找到类，则自动加载类库
         * 如：\code\route.php
         * 转换\为/等
         */
        if(isset(self::$classMap[$class])){
            return true;
        }else {
            $clazz = str_replace("\\", "/", $class);
            $file = TP . $class . EXT;
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $clazz;
            } else {
                return false;
            }
        }
    }

    /**
     * 向视图中传递数据
     * @param $name
     * @param $val
     */
    public function assgin($name, $val){
        $this->assgin[$name] = $val;
    }

    /**
     * @param $file
     */
    public  function display($file)
    {
        $viewPath = APP."views".DS.$file;
        if(is_file($viewPath)){
            extract($this->assgin);
            include $viewPath;
        }else{
            throw new \Exception("找不到视图文件. ".$viewPath);
        }
    }
}