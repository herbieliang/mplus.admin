<?php
/**
 * 登陆逻辑层
 * User: Zachary Liang
 * Date: 16-11-27
 * Time: 下午4:27
 */

namespace app\manage\logic;
use app\common\model\Admin;
use app\manage\common;
use app\manage\common\logic\BaseLogic;
use think\Loader;
use think\Session;

class Login extends BaseLogic
{
    /**
     * @var Admin
     */
    private $admin_model;

    /**
     * @var \app\manage\validate\Login
     */
    protected $validate;

    public function initialize()
    {
        parent::initialize();
        $this->admin_model = model('Admin');
        $this->validate = validate('Login', 'validate');
    }

    public function sign_in($param){
        if (!$this->validate->check($param)){
            return common::return_result('500', $this->validate->getError(), null);
        } else {
            $result = $this->admin_model->login_check($param);
            if ($result){
                Session::set('admin', $result);
                return common::return_result('200', SIGNIN_SUCCESS_TEXT, url('Index/Index'));
            } else {
                return common::return_result('500', SIGNIN_FAILURE_TEXT, null);
            }
        }
    }

    public function sign_out(){
        Session::set('admin', null);
        if (!Session::get('admin')){
            return common::return_result('200', SIGNOUT_SUCCESS_TEXT, url('Index/Index'));
        } else {
            return common::return_result('500', SIGNOUT_FAILURE_TEXT, null);
        }
    }
}