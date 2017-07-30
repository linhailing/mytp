<?php
/**
 * Created by PhpStorm.
 * User: Henry
 * Date: 2017/7/30
 * Time: 15:34
 */

namespace code\lib;
use code\lib\conf;
use Medoo\Medoo;
/***
 * 数据库操作类
 * @package code\lib
 */
class model extends Medoo
{
    public function __construct()
    {
        $options = conf::getAll('database');
        parent::__construct($options);
    }
}