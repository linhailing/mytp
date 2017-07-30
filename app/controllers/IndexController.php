<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 14:51
 */

namespace app\controllers;
use \code\tp;
use \code\lib\model;
use \code\lib\conf;

class IndexController extends tp
{
    public function Index(){
        //p("this is index controller index action");
//        $mode = new model();
//        $sql = "select * from test";
//        $res = $mode->query($sql);
//        p($res->fetchAll());
        $data = "test";
        $title = "这个是测试视图文件";
        $this->assgin("data", $data);
        $this->assgin("title", $title);
        $this->display("index\index.html");
    }
    public function  Test(){
        //取出路由的配置项
//        p(conf::get("CONTRO", 'route'));
        $model = new model();
        $sql = "select * from test";
        $res = $model->query($sql);
        p($res->fetchAll());
    }
}