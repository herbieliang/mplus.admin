<?php
/**
 * 登陆控制器
 * User: Zachary Liang
 * Date: 16-11-27
 * Time: 下午2:51
 */

namespace app\manage\controller;
use think\Controller;

/**
 * Class Login
 * @package app\manage\controller
 */
class Login extends Controller
{
    /**
     * @var \app\manage\logic\Login
     */
    private $login_logic;

    /**
     * 构造函数
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->login_logic = model('Login', 'logic');
    }

    public function Index(){
        if (request()->isPost()){
            return json($this->login_logic->sign_in(input('post.')));
        } else {
            return $this->fetch('Login' . DS . 'Index');
        }
    }
}