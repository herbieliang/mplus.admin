<?php
/**
 * 权限节点逻辑层
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午3:23
 */

namespace app\manage\logic;
use app\manage\common\logic\BaseLogic;
use app\manage\common\logic\ILogic;
use think\Loader;

/**
 * Class AuthRule
 * @package app\manage\logic
 */
class AuthRule extends BaseLogic implements ILogic
{
    /**
     * @var \app\common\model\AuthRule
     */
    private $auth_rule_model;

    /**
     * 构造函数
     */
    public function initialize()
    {
        parent::initialize();
        $this->auth_rule_model = Loader::model('AuthRule');
    }

    /**
     * 获取权限节点列表
     * @return array
     */
    public function get_list()
    {
        $auth_rules = $this->auth_rule_model->select();
        return $auth_rules ?: null;
    }

    /**
     * 获取节点模型
     * @param $uuid
     * @return null
     */
    public function get_model($uuid)
    {
        $auth_rule = $this->auth_rule_model->find($uuid);
        return $auth_rule ?: null;
    }

    public function add($param)
    {
        // TODO: Implement add() method.
    }

    public function edit($param, $uuid)
    {
        // TODO: Implement edit() method.
    }

    public function del($param)
    {
        // TODO: Implement del() method.
    }

    public function batch_del($param)
    {
        // TODO: Implement batch_del() method.
    }

}