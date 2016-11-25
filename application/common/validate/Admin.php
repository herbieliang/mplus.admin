<?php
/**
 * 管理员模型验证器
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午2:38
 */

namespace app\common\validate;
use think\Validate;

/**
 * Class Admin
 * @package app\common\validate
 */
class Admin extends Validate
{
    protected $rule = [
        'account'               =>  'require|max:20|unique:admin',
        'password'              =>  'require',
        'nickname'              =>  'max:10',
        'email'                 =>  'max:30',
    ];

    protected $message  =   [
        'account.require'       =>  '请填写管理员帐号！',
        'account.max'           =>  '管理员帐号最多不能超过20个字符！',
        'account.unique'        =>  '管理员帐号已存在！',
        'password.require'      =>  '请填写管理员密码！',
        'nickname.max'          =>  '管理员昵称最多不能超过10个字符！',
        'email'                 =>  '邮箱格式错误！',
    ];

    protected $scene = [
        'add'                   =>  ['account', 'password', 'nickname', 'email'],
        'edit'                  =>  ['nickname', 'email'],
        'update_password'       =>  ['password']
    ];
}