<?php
/**
 * 管理员模型
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午2:35
 */

namespace app\common\model;
use app\common\common;
use think\Model;

/**
 * Class Admin
 * @package app\common\model
 */
class Admin extends Model
{
    protected $insert = ['uuid', 'password', 'state'];
    protected $update = ['password', 'state'];

    protected function setUuidAttr($value){
        return common::get_uniqueness_id();
    }

    protected function setPasswordAttr($value)
    {
        return md5(md5($value));
    }

    protected function setStateAttr($value){
        return $value === 'on' ? 1 : 0;
    }
}