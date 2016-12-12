<?php
/**
 * 角色控制器
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午2:51
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;

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
        $this->auth_group_logic = model('AuthGroup', 'logic');
        $this->auth_rule_logic = model('AuthRule', 'logic');
        $this->data['rules'] = $this->auth_rule_logic->get_list_without_closed();
    }

    /**
     * 列表
     * @return mixed
     */
    public function Index(){
        $this->data['auth_groups'] = $this->auth_group_logic->get_list();
        return $this->ShowView();
    }

    /**
     * 添加
     * @return mixed|\think\response\Json
     */
    public function Add(){
        if (request()->isPost()){
            return json($this->auth_group_logic->add(input('post.')));
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
            return json($this->auth_group_logic->edit(input('post.'), $uuid));
        } else {
            $this->data['auth_group'] = $this->auth_group_logic->get_model($uuid);
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
                return json($this->auth_group_logic->batch_del(input('post.')));
            } else {
                return json($this->auth_group_logic->del(input('post.')));
            }
        }
    }
}