<?php
/**
 * 权限组逻辑层
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午3:27
 */

namespace app\manage\logic;
use app\manage\common;
use app\manage\common\logic\BaseLogic;
use app\manage\common\logic\ILogic;
use think\Loader;

/**
 * Class AuthGroup
 * @package app\manage\logic
 */
class AuthGroup extends BaseLogic implements ILogic
{
    /**
     * @var \app\common\model\AuthGroup
     */
    private $auth_group_model;

    /**
     * @var AuthRule
     */
    private $auth_rule_logic;

    /**
     * @var \app\common\validate\AuthGroup
     */
    protected $validate;

    /**
     * 构造函数
     */
    public function initialize()
    {
        parent::initialize();
        $this->auth_group_model = Loader::model('AuthGroup');
        $this->validate = Loader::validate('AuthGroup');
        $this->auth_rule_logic = Loader::model('AuthRule', 'logic', null, 'manage');
    }

    /**
     * 获取权限组列表
     * @return array
     */
    public function get_list()
    {
        $auth_groups = $this->auth_group_model->order('create_time', 'desc')->select();
        foreach ($auth_groups as $auth_group){
            $rules = array();
            $temp = explode(',', $auth_group['rules']);
            foreach ($temp as $item){
                $auth_rule = $this->auth_rule_logic->get_model($item);
                $rules[] = $auth_rule['title'];
            }
            $auth_group['rules'] = $rules;
        }
        return $auth_groups ?: null;
    }

    /**
     * 获取权限组模型
     * @param $uuid
     * @return \app\common\model\AuthGroup
     */
    public function get_model($uuid)
    {
        $auth_group = $this->auth_group_model->find($uuid);
        return $auth_group ?: null;
    }

    /**
     * 添加权限组
     * @param $param
     * @return array
     */
    public function add($param)
    {
        if (!$this->validate->scene('add')->check($param)){
            return common::return_result('500', $this->validate->getError(), null);
        } else {
            $result = $this->auth_group_model->save($param);
            return $result ?
                common::return_result('200', ADD_SUCCESS_TEXT, url('AuthGroup/Index')) :
                common::return_result('500', ADD_FAILURE_TEXT, null);

        }
    }

    /**
     * 编辑权限组
     * @param $param
     * @param $uuid
     * @return array
     */
    public function edit($param, $uuid)
    {
        if (!$this->validate->scene('edit')->check($param)){
            return common::return_result('500', $this->validate->getError(), null);
        } else {
            $result = $this->auth_group_model->save($param, ['id' => $uuid]);
            return $result ?
                common::return_result('200', EDIT_SUCCESS_TEXT, url('AuthGroup/Index')) :
                common::return_result('500', EDIT_FAILURE_TEXT, null);
        }
    }

    /**
     * 删除权限组
     * @param $param
     * @return array
     */
    public function del($param)
    {
        if ($param['item'] === '1'){
            return common::return_result('500', AUTH_GROUP_CANNOT_DELETE_TEXT, null);
        }

        $map['id'] = $param['item'];
        $result = $this->auth_group_model->where($map)->delete();
        return $result ?
            common::return_result('200', DELETE_SUCCESS_TEXT, null) :
            common::return_result('500', DELETE_FAILURE_TEXT, null);
    }

    public function batch_del($param)
    {
        if (strpos($param['items'], '1,') !== false){
            return common::return_result('500', AUTH_GROUP_CANNOT_DELETE_TEXT, null);
        }

        $map['id'] = array('IN', rtrim($param['items'], ','));
        $result = $this->auth_group_model->where($map)->delete();
        return $result ?
            common::return_result('200', BATCH_DELETE_SUCCESS_TEXT, null) :
            common::return_result('500', BATCH_DELETE_FAILURE_TEXT, null);
    }
}