<?php
/**
 * 控制器基类
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午12:56
 */

namespace app\manage\common\controller;
use app\manage\common;
use app\manage\common\Auth;
use think\Config;
use think\Controller;
use think\exception\HttpResponseException;
use think\Response;
use think\Session;

/**
 * Class BaseController
 * @package app\manage\common\controller
 */
class BaseController extends Controller
{
    protected $data;

    protected function _initialize()
    {
        parent::_initialize();
        $this->data['resource_path'] = Config::get('RESOURCE_PATH');
        $this->CheckLogin();
//        $this->CheckPermission();
    }

    /**
     * 登陆验证
     */
    public function CheckLogin(){
        if (!Session::get('admin') || Session::get('admin') === null){
            $this->redirect(url('Login/Index'));
        } else {
            Session::set('admin', Session::get('admin'));
        }
    }

    /**
     * 验证权限
     */
    protected function CheckPermission(){
        $controller = request()->controller();
        $action = request()->action();
        $pass_controller = array('Index');
        $pass_action = array('Index', 'Home', 'SignOut');
        $auth = new Auth();
        if (!in_array($controller, $pass_controller) && !in_array($action, $pass_action)){
            if(!$auth->check($controller . '-' . $action, 1)){
                if ($_POST){
                    $result = common::return_result('500', '你没有此操作的权限！', null);
                    $response = Response::create($result, 'json')->header(request()->header());
                    throw new HttpResponseException($response);
                } else {
                    $this->error('你没有权限访问此功能！');
                }
            }
        }
    }

}