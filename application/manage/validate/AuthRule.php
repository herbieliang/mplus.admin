<?php
/**
 * 权限节点验证器
 * User: Zachary Liang
 * Date: 16-11-27
 * Time: 上午10:19
 */

namespace app\manage\validate;
use think\Validate;

/**
 * Class AuthRule
 * @package app\common\validate
 */
class AuthRule extends Validate
{
    protected $rule = [
        'name'                  =>  'require|max:80|unique:auth_rule',
        'title'                 =>  'require|max:20'
    ];

    protected $message  =   [
        'name.require'          =>  '请填写权限节点唯一标识！',
        'name.max'              =>  '权限节点唯一标识最多不能超过80个字符！',
        'name.unique'           =>  '权限节点唯一标识已存在！',
        'title.require'         =>  '请填写权限节点名称！',
        'title.max'             =>  '权限节点名称最多不能超过20个字符！',
    ];

    protected $scene = [
        'add'                   =>  ['name', 'title'],
        'edit'                  =>  ['title'],
    ];
}