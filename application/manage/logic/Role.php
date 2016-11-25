<?php
/**
 * 角色逻辑层
 * User: Zachary Liang
 * Date: 16-11-25
 * Time: 下午5:16
 */

namespace app\manage\logic;


use app\manage\common;
use app\manage\common\logic\BaseLogic;
use app\manage\common\logic\ILogic;
use think\Loader;

/**
 * Class Role
 * @package app\manage\logic
 */
class Role extends BaseLogic implements ILogic
{
    /**
     * @var \app\common\model\Role
     */
    private $role_model;

    /**
     * @var \app\common\validate\Role
     */
    protected $validate;

    /**
     * 构造函数
     */
    public function initialize()
    {
        parent::initialize();
        $this->role_model = Loader::model('Role');
        $this->validate = Loader::validate('Role');
    }

    /**
     * 获取角色列表
     * @return array
     */
    public function get_list()
    {
        $roles = $this->role_model->order('create_time', 'desc')->select();
        return $roles ?: null;
    }

    /**
     * 获取角色模型
     * @param $uuid
     * @return \app\common\model\Role
     */
    public function get_model($uuid)
    {
        $map['uuid'] = $uuid;
        $role = $this->role_model->where($map)->find();
        return $role ?: null;
    }

    /**
     * 添加角色
     * @param $param
     * @return array
     */
    public function add($param)
    {
        if (!$this->validate->scene('add')->check($param)){
            return common::return_result('500', $this->validate->getError(), null);
        } else {
            $result = $this->role_model->save($param);
            return $result ?
                common::return_result('200', ADD_SUCCESS_TEXT, url('Role/Index')) :
                common::return_result('500', ADD_FAILURE_TEXT, null);

        }
    }

    /**
     * 编辑角色
     * @param $param
     * @param $uuid
     * @return array
     */
    public function edit($param, $uuid)
    {
        if (!$this->validate->scene('edit')->check($param)){
            return common::return_result('500', $this->validate->getError(), null);
        } else {
            $result = $this->role_model->save($param, ['uuid' => $uuid]);
            return $result ?
                common::return_result('200', EDIT_SUCCESS_TEXT, url('Role/Index')) :
                common::return_result('500', EDIT_FAILURE_TEXT, null);
        }
    }

    /**
     * 删除角色
     * @param $param
     * @return array
     */
    public function del($param)
    {
        if ($param['item'] === '000000000000000'){
            return common::return_result('500', ROLE_CANNOT_DELETE_TEXT, null);
        }

        $map['uuid'] = $param['item'];
        $result = $this->role_model->where($map)->delete();
        return $result ?
            common::return_result('200', DELETE_SUCCESS_TEXT, null) :
            common::return_result('500', DELETE_FAILURE_TEXT, null);
    }

    /**
     * 批量删除角色
     * @param $param
     * @return array
     */
    public function batch_del($param)
    {
        if (strpos($param['items'], '000000000000000,') !== false){
            return common::return_result('500', ROLE_CANNOT_DELETE_TEXT, null);
        }

        $map['uuid'] = array('IN', rtrim($param['items'], ','));
        $result = $this->role_model->where($map)->delete();
        return $result ?
            common::return_result('200', BATCH_DELETE_SUCCESS_TEXT, null) :
            common::return_result('500', BATCH_DELETE_FAILURE_TEXT, null);
    }

}