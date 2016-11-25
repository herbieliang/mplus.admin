<?php
/**
 * 角色控制器
 * User: Zachary Liang
 * Date: 16-11-25
 * Time: 下午5:46
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;
use think\Loader;

/**
 * Class Role
 * @package app\manage\controller
 */
class Role extends BaseController
{
    /**
     * @var \app\manage\logic\Role
     */
    private $role_logic;

    /**
     * 构造方法
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->role_logic = Loader::model('Role', 'logic', null, 'manage');
    }

    /**
     * 列表
     * @return mixed
     */
    public function Index(){
        $this->data['roles'] = $this->role_logic->get_list();
        $this->assign('data', $this->data);
        return $this->fetch('Role' . DS . 'Index');
    }

    /**
     * 添加
     * @return mixed|\think\response\Json
     */
    public function Add(){
        if ($_POST){
            return json($this->role_logic->add($_POST));
        } else {
            $this->assign('data', $this->data);
            return $this->fetch('Role' . DS . 'Add');
        }
    }

    /**
     * 编辑
     * @param $uuid
     * @return mixed|\think\response\Json
     */
    public function Edit($uuid){
        if ($_POST){
            return json($this->role_logic->edit($_POST, $uuid));
        } else {
            $this->data['role'] = $this->role_logic->get_model($uuid);
            $this->assign('data', $this->data);
            return $this->fetch('Role' . DS . 'Edit');
        }
    }

    /**
     * 删除
     * @return \think\response\Json
     */
    public function Delete(){
        if ($_POST){
            return json($this->role_logic->del($_POST));
        }
    }

    /**
     * 批量删除
     * @return \think\response\Json
     */
    public function BatchDelete(){
        if ($_POST){
            return json($this->role_logic->batch_del($_POST));
        }
    }
}