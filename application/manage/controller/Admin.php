<?php
/**
 * 管理员控制器
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午4:35
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;
use app\manage\logic\AuthGroup;

/**
 * Class Admin
 * @package app\manage\controller
 */
class Admin extends BaseController
{
    /**
     * @var \app\manage\logic\Admin
     */
    private $admin_logic;

    /**
     * @var AuthGroup
     */
    private $auth_group_logic;

    /**
     * 构造方法
     */
    protected function _initialize()
    {
        parent::_initialize();
        $this->admin_logic = model('Admin', 'logic');
        $this->auth_group_logic = model('AuthGroup', 'logic');
        $this->data['auth_groups'] = $this->auth_group_logic->get_list_without_closed();
    }

    /**
     * 列表
     * @return mixed
     */
    public function Index(){
        $this->data['admins'] = $this->admin_logic->get_list();
        return $this->ShowView();
    }

    /**
     * 添加
     * @return mixed|\think\response\Json
     */
    public function Add(){
        if (request()->isPost()){
            return json($this->admin_logic->add(input('post.')));
        } else {
            return $this->ShowView();
        }
    }

    /**
     * 编辑
     * @param $uuid
     * @return mixed|\think\response\Json
     */
    public function Edit($uuid){
        if (request()->isPost()){
            return json($this->admin_logic->edit(input('post.'), $uuid));
        } else {
            $this->data['admin'] = $this->admin_logic->get_model($uuid);
            return $this->ShowView();
        }
    }

    /**
     * 删除
     * @param $type
     * @return \think\response\Json
     */
    public function Delete($type = ''){
        if (request()->isPost()){
            if ($type === 'batch'){
                return json($this->admin_logic->batch_del(input('post.')));
            } else {
                return json($this->admin_logic->del(input('post.')));
            }
        }
    }

    /**
     * 更新密码
     * @return \think\response\Json
     */
    public function UpdatePassword(){
        if (request()->isPost()){
            return json($this->admin_logic->update_password(input('post.')));
        }
    }
}