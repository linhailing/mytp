<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 15:34
 */

namespace code\lib;
use code\lib\conf;
/***
 * 数据库操作类
 * @package code\lib
 */
class model extends \PDO
{
    public function __construct()
    {
        $data = conf::getAll('database');
        try{
            parent::__construct($data['DNS'], $data['USERNAME'], $data['PASSWD']);
        }catch (\PDOException $e){
            p($e->getMessage());
        }
    }
}