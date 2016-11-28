<?php
/**
 * 管理员模型
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午2:35
 */

namespace app\common\model;
use app\common\common;
use think\Db;
use think\Model;

/**
 * Class Admin
 * @package app\common\model
 */
class Admin extends Model
{
    /**
     * 获取角色Id
     * @param $value
     * @param $data
     * @return mixed
     */
    public function getRoleAttr($value, $data){
        $result = db('auth_group_access')
            ->where('uid', $data['id'])
            ->field('group_id')
            ->find();
        return $result['group_id'];
    }

    /**
     * 获取角色的名称
     * @param $value
     * @param $data
     * @return mixed
     */
    public function getRoleNameAttr($value, $data){
        $result = db('auth_group_access')
            ->alias('access')
            ->where('uid', $data['id'])
            ->join('__AUTH_GROUP__ group', 'access.group_id = group.id')
            ->field('group.title')
            ->find();
        return $result['title'];
    }

    /**
     * 添加操作，使用事务添加多个表
     * @param $param
     * @return bool
     */
    public function add($param){
        $role_id = $param['role'];
        unset($param['role']);
        $param['uuid'] = common::get_uniqueness_id();
        $param['password'] = md5(md5($param['password']));
        $param['state'] = isset($param['state']) ? 1 : 0;
        $param['create_time'] = date($this->dateFormat, time());
        $param['update_time'] = date($this->dateFormat, time());
        Db::startTrans();
        try{
            $id = db('admin')
                ->insertGetId($param);
            db('auth_group_access')
                ->insert([
                    'uid'=>$id,
                    'group_id'=>$role_id,
                    'create_time' => date($this->dateFormat, time()),
                    'update_time' => date($this->dateFormat, time())
                ]);
            db('admin_profile')
                ->insert([
                    'uid'=>$id,
                    'create_time' => date($this->dateFormat, time()),
                    'update_time' => date($this->dateFormat, time())
                ]);
            Db::commit();
            return true;
        } catch (\Exception $exception){
            Db::rollback();
            return false;
        }
    }

    /**
     * 编辑操作，使用事务编辑多个表
     * @param $param
     * @return bool
     */
    public function edit($param){
        $role_id = $param['role'];
        unset($param['role']);
        $param['state'] = isset($param['state']) ? 1 : 0;
        $param['update_time'] = date($this->dateFormat, time());
        Db::startTrans();
        try{
            db('admin')
                ->where('id', $param['id'])
                ->update($param);
            db('auth_group_access')
                ->where('uid', $param['id'])
                ->update([
                    'group_id'=>$role_id,
                    'update_time' => date($this->dateFormat, time())
                ]);
            Db::commit();
            return true;
        } catch (\Exception $exception){
            Db::rollback();
            return false;
        }
    }

    /**
     * 删除操作，同时删除相关联表的数据
     * @param $param
     * @return bool
     */
    public function del($param){
        Db::startTrans();
        try{
            db('admin')
                ->where('id', $param['item'])
                ->delete();
            db('auth_group_access')
                ->where('uid', $param['item'])
                ->delete();
            db('admin_profile')
                ->where('uid', $param['item'])
                ->delete();
            Db::commit();
            return true;
        } catch (\Exception $exception){
            Db::rollback();
            return false;
        }
    }

    /**
     * 批量删除操作，同时删除相关联表的数据
     * @param $param
     * @return bool
     */
    public function batch_del($param){
        Db::startTrans();
        try{
            db('admin')
                ->where('id', 'IN', $param['items'])
                ->delete();
            db('auth_group_access')
                ->where('uid', 'IN', $param['items'])
                ->delete();
            db('admin_profile')
                ->where('uid', 'IN', $param['items'])
                ->delete();
            Db::commit();
            return true;
        } catch (\Exception $exception){
            Db::rollback();
            return false;
        }
    }

    /**
     * 更新密码
     * @param $param
     * @return int|string
     */
    public function update_password($param){
        $password = common::encrypt_password($param['password']);
        $result = db('admin')
            ->where('uuid', $param['item'])
            ->update(['password' => $password]);
        return $result;
    }

    /**
     * 登陆验证查询
     * @param $param
     * @return mixed
     */
    public function login_check($param){
        $result = db('admin')
            ->alias('admin')
            ->where('account', $param['account'])
            ->where('password', common::encrypt_password($param['password']))
            ->where('state', 1)
            ->join('__AUTH_GROUP_ACCESS__ access', 'access.uid = admin.id')
            ->join('__AUTH_GROUP__ group', 'group.id = access.group_id')
            ->join('__ADMIN_PROFILE__ profile', 'profile.uid = admin.id')
            ->field('admin.*, group.title as rolename, profile.avatar as avatar')
            ->find();
        return $result;
    }

}