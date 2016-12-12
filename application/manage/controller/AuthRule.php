<?php
/**
 * 权限节点控制器
 * User: Zachary Liang
 * Date: 16-11-27
 * Time: 上午10:41
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;

/**
 * Class AuthRule
 * @package app\manage\controller
 */
class AuthRule extends BaseController
{
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
        $this->auth_rule_logic = model('AuthRule', 'logic');
    }

    /**
     * 列表
     * @return mixed
     */
    public function Index(){
        $this->data['auth_rules'] = $this->auth_rule_logic->get_list();
        return $this->ShowView();
    }

    /**
     * 添加
     * @return mixed|\think\response\Json
     */
    public function Add(){
        if (request()->isPost()){
            return json($this->auth_rule_logic->add(input('post.')));
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
            return json($this->auth_rule_logic->edit(input('post.'), $uuid));
        } else {
            $this->data['auth_rule'] = $this->auth_rule_logic->get_model($uuid);
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
                return json($this->auth_rule_logic->batch_del(input('post.')));
            } else {
                return json($this->auth_rule_logic->del(input('post.')));
            }
        }
    }
}