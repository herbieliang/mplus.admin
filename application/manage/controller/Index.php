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
use think\Loader;

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
        $this->login_logic = Loader::model('Login', 'logic', null, 'manage');
    }

    public function Index(){
        $this->assign('data', $this->data);
        return $this->fetch('Index' . DS . 'Index');
    }

    public function Home(){
        $this->assign('data', $this->data);
        return $this->fetch('Index' . DS .'Home');
    }

    public function SignOut(){
        if (request()->isPost()){
            return json($this->login_logic->sign_out());
        }
    }
}