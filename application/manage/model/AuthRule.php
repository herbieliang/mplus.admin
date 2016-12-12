<?php
/**
 * 权限节点模型
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午2:58
 */

namespace app\manage\model;
use think\Model;

/**
 * Class AuthRule
 * @package app\common\model
 */
class AuthRule extends Model
{
    protected $insert = ['status'];
    protected $update = ['status'];

    protected function setStatusAttr($value){
        return $value === 'on' ? 1 : 0;
    }
}