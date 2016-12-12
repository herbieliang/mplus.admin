<?php
/**
 * 个人设置控制器
 * User: Zachary Liang
 * Date: 16-11-28
 * Time: 下午4:55
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;
use app\manage\logic\AuthRule;

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

    /**
     * @var AuthRule
     */
    private $auth_rule_logic;

    public function _initialize()
    {
        parent::_initialize();
        $this->profile_logic = new \app\manage\logic\Profile();
        $this->auth_rule_logic = model('AuthRule', 'logic');
        $this->data['profile'] = $this->profile_logic->get_model();
        $this->data['rules'] = $this->auth_rule_logic->get_list_without_closed();
    }

    public function Index(){
        return $this->ShowView();
    }

    public function UploadAvatar(){
        if (request()->isPost()){
            return json($this->profile_logic->upload_avatar(input('post.')));
        }
    }

    public function Save(){
        if (request()->isPost()){
            return json($this->profile_logic->save_profile(input('post.')));
        }
    }

    public function UpdatePassword(){
        if (request()->isPost()){
            return json($this->profile_logic->update_password(input('post.')));
        }
    }
}