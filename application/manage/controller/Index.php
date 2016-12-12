<?php
/**
 *
 * User: Zachary Liang
 * Date: 16-11-22
 * Time: 下午4:34
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;
use app\manage\logic\Login;
use think\Session;

/**
 * Class Index
 * @package app\manage\controller
 */
class Index extends BaseController
{
    /**
     * @var Login
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
        return $this->ShowView();
    }

    public function Home(){
        return $this->ShowView();
    }

    public function SignOut(){
        if (request()->isPost()){
            return json($this->login_logic->sign_out());
        }
    }
}