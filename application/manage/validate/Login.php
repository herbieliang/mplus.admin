<?php
/**
 * 登陆验证器
 * User: Zachary Liang
 * Date: 16-11-27
 * Time: 下午4:23
 */

namespace app\manage\validate;
use think\Validate;

/**
 * Class Login
 * @package app\manage\common\validate
 */
class Login extends Validate
{
    protected $rule = [
        'account'               =>  'require|max:20',
        'password'              =>  'require',
        'verify'                =>  'require|captcha'
    ];

    protected $message  =   [
        'account.require'       =>  '请填写用户帐号！',
        'account.max'           =>  '用户帐号最多不能超过20个字符！',
        'password.require'      =>  '请填写用户密码！',
        'verify.require'        =>  '请填写验证码！',
        'verify.captcha'        =>  '验证码不正确！'
    ];
}