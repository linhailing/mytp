<?php
/**
 * 自己编写一个自己的框架
 * 文件入口
 * 设置一些常量和定义一些路径等
 * 加载类库文件
 * 启动框架
 */
define('EXT', '.php');
define('DS', DIRECTORY_SEPARATOR);
defined('TP') or define('TP', __DIR__ . DS);
defined('CODE') or define("CODE", TP.'code' . DS);
defined('APP') or define('APP', TP.'app'. DS);
defined('MODULE') or define('MODULE', 'app');

//是否开启调试模式
defined('DEBUG') or define('DEBUG', true);

include "vendor/autoload.php";
if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error', 'On');
}else{
    ini_set('display_error', 'Off');
}
//加载公共类库文件
include CODE.'common/func.php';


//加载核心库文件
include CODE."tp.php";

// 如果没有找到文件类库，则自动加载文件
spl_autoload_register('\code\tp::load');

\code\tp::run();

