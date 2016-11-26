<?php
/**
 * 权限组控制器
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午2:51
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;
use think\Loader;

/**
 * Class AuthGroup
 * @package app\manage\controller
 */
class AuthGroup extends BaseController
{
    /**
     * @var \app\manage\logic\AuthGroup
     */
    private $auth_group_logic;

    /**
     * @var \app\manage\logic\AuthRule
     */
    private $auth_rule_logic;

    /**
     * 构造函数
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->auth_group_logic = Loader::model('AuthGroup', 'logic', null, 'manage');
        $this->auth_rule_logic = Loader::model('AuthRule', 'logic', null, 'manage');
        $this->data['rules'] = $this->auth_rule_logic->get_list();
    }

    /**
     * 列表
     * @return mixed
     */
    public function Index(){
        $this->data['auth_groups'] = $this->auth_group_logic->get_list();
        $this->assign('data', $this->data);
        return $this->fetch('AuthGroup' . DS . 'Index');
    }

    /**
     * 添加
     * @return mixed|\think\response\Json
     */
    public function Add(){
        if ($_POST){
            return json($this->auth_group_logic->add($_POST));
        } else {
            $this->assign('data', $this->data);
            return $this->fetch('AuthGroup' . DS . 'Add');
        }
    }

    /**
     * 编辑
     * @param $uuid
     * @return mixed|\think\response\Json
     */
    public function Edit($uuid){
        if ($_POST){
            return json($this->auth_group_logic->edit($_POST, $uuid));
        } else {
            $this->data['auth_group'] = $this->auth_group_logic->get_model($uuid);
            $this->assign('data', $this->data);
            return $this->fetch('AuthGroup' . DS . 'Edit');
        }
    }

    /**
     * 删除
     * @param $type
     * @return \think\response\Json
     */
    public function Delete($type = ''){
        if ($_POST){
            if ($type === 'batch'){
                return json($this->auth_group_logic->batch_del($_POST));
            } else {
                return json($this->auth_group_logic->del($_POST));
            }
        }
    }
}