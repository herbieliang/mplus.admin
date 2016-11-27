<?php
/**
 * 角色模型验证器
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午2:18
 */

namespace app\manage\common\validate;
use think\Validate;

class AuthGroup extends Validate
{
    protected $rule = [
        'title'                 =>  'require|max:100|unique:auth_group',
        'rules'                 =>  'require|max:80'
    ];

    protected $message  =   [
        'title.require'         =>  '请填写权限组名称！',
        'title.max'             =>  '权限组名称最多不能超过100个字符！',
        'title.unique'          =>  '权限组名称已存在！',
        'rules.require'         =>  '请选择包含权限！',
        'rules.max'             =>  '包含权限超限！',
    ];

    protected $scene = [
        'add'                   =>  ['title', 'rules'],
        'edit'                  =>  ['rules'],
    ];
}