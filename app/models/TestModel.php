<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 20:50
 */

namespace app\models;
use code\lib\model;

class TestModel extends model
{
    public $table = 'test';
    public function all($data='*'){
        return $this->select($this->table,$data);
    }
    public  function getOne($json='*', $where=null){
        return $this->select($this->table, $json, $where);
    }
}