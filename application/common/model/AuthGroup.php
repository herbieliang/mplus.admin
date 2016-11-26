<?php
/**
 * 用户组模型
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午2:15
 */

namespace app\common\model;
use think\Model;

/**
 * Class AuthGroup
 * @package app\common\model
 */
class AuthGroup extends Model
{
    protected $insert = ['rules', 'status'];
    protected $update = ['rules', 'status'];

    public function setRulesAttr($value){
        $rules_str = implode(',', $value);
        return rtrim($rules_str, ',');
    }

    protected function setStatusAttr($value){
        return $value === 'on' ? 1 : 0;
    }
}