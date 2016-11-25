<?php
/**
 * 角色模型验证器
 * User: Zachary Liang
 * Date: 16-11-25
 * Time: 下午5:07
 */

namespace app\common\validate;
use think\Validate;

/**
 * Class Role
 * @package app\common\validate
 */
class Role extends Validate
{
    protected $rule = [
        'title'                 =>  'require|max:10|unique:role',
        'description'           =>  'max:250',
        'permission'            =>  'require',
    ];

    protected $message  =   [
        'title.require'         =>  '请填写角色名称！',
        'title.max'             =>  '角色名称最多不能超过10个字符！',
        'title.unique'          =>  '角色名称已存在！',
        'description.max'       =>  '角色描述最多不能超过250个字符！',
        'permission.require'    =>  '请选择角色拥有的权限！',
    ];

    protected $scene = [
        'add'                   =>  ['title', 'description', 'permission'],
        'edit'                  =>  ['description', 'permission'],
    ];
}