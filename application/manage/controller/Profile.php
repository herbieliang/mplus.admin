<?php
/**
 * 个人设置控制器
 * User: Zachary Liang
 * Date: 16-11-28
 * Time: 下午4:55
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;

/**
 * Class Profile
 * @package app\manage\controller
 */
class Profile extends BaseController
{
    /**
     * @var \app\manage\logic\Profile
     */
    private $profile_logic;

    public function _initialize()
    {
        parent::_initialize();
        $this->profile_logic = new \app\manage\logic\Profile();
    }

    public function Index(){
        $this->assign('data', $this->data);
        return $this->fetch('Profile' . DS . 'Index');
    }

    public function UploadAvatar(){
        if (request()->isPost()){
            return json($this->profile_logic->upload_avatar(input('post.')));
        }
    }
}