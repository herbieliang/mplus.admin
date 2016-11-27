<?php
/**
 * 管理员模型
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午2:35
 */

namespace app\common\model;
use app\common\common;
use think\model\Merge;

/**
 * Class Admin
 * @package app\common\model
 */
class Admin extends Merge
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

    public function getRoleAttr($value, $data){
        $auth_group_access = AuthGroupAccess::get(['uid' => $data['id']]);
        return $auth_group_access->group_id;
    }

    public function getRoleNameAttr($value, $data){
        $auth_group_access = AuthGroupAccess::get(['uid' => $data['id']]);
        $auth_group = AuthGroup::get(['id' => $auth_group_access->group_id]);
        return $auth_group->title;
    }

    /**
     * 定义关联模型
     * @return \think\model\Relation
     */
    public function AuthGroupAccess()
    {
        return $this->hasOne('AuthGroupAccess', 'uid');
    }

}