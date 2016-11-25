<?php
/**
 * 角色模型
 * User: Zachary Liang
 * Date: 16-11-25
 * Time: 下午5:05
 */

namespace app\common\model;
use app\common\common;
use think\Model;

/**
 * Class Role
 * @package app\common\model
 */
class Role extends Model
{
    protected $insert = ['uuid'];

    protected function setUuidAttr($value){
        return common::get_uniqueness_id();
    }
}