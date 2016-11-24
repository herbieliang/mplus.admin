<?php
/**
 * 管理员控制器
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午4:35
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;
use think\Loader;

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
     * 构造方法
     */
    protected function _initialize()
    {
        parent::_initialize();
        $this->admin_logic = Loader::model('Admin', 'logic', null, 'manage');
    }

    public function Index(){
        $this->data['admins'] = $this->admin_logic->get_list();
        $this->assign('data', $this->data);
        return $this->fetch('Admin' . DS . 'Index');
    }

    public function Add(){
        if ($_POST){
            return json($this->admin_logic->add($_POST));
        } else {
            $this->assign('data', $this->data);
            return $this->fetch('Admin' . DS . 'Add');
        }
    }


}