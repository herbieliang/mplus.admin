<?php
/**
 * logic基类
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午3:18
 */

namespace app\manage\common\logic;
use think\Model;

/**
 * Class BaseLogic
 * @package app\manage\common\logic
 */
class BaseLogic extends Model
{
    /**
     * 构造函数
     */
    public function initialize()
    {
        parent::initialize();
        if (!defined('ADD_SUCCESS_TEXT')){define('ADD_SUCCESS_TEXT', '添加成功！');};
        if (!defined('ADD_FAILURE_TEXT')){define('ADD_FAILURE_TEXT', '添加失败！');};
        if (!defined('EDIT_SUCCESS_TEXT')){define('EDIT_SUCCESS_TEXT', '编辑成功！');};
        if (!defined('EDIT_FAILURE_TEXT')){define('EDIT_FAILURE_TEXT', '编辑失败！');};
        if (!defined('DELETE_SUCCESS_TEXT')){define('DELETE_SUCCESS_TEXT', '删除成功！');};
        if (!defined('DELETE_FAILURE_TEXT')){define('DELETE_FAILURE_TEXT', '删除失败！');};
        if (!defined('BATCH_DELETE_SUCCESS_TEXT')){define('BATCH_DELETE_SUCCESS_TEXT', '批量删除成功！');};
        if (!defined('BATCH_DELETE_FAILURE_TEXT')){define('BATCH_DELETE_FAILURE_TEXT', '批量删除失败！');};
        if (!defined('ADMIN_CANNOT_DELETE_TEXT')){define('ADMIN_CANNOT_DELETE_TEXT', '内置管理员禁止删除！');};
        if (!defined('UPDATE_PASSWORD_SUCCESS_TEXT')){define('UPDATE_PASSWORD_SUCCESS_TEXT', '密码更新成功！');};
        if (!defined('UPDATE_PASSWORD_FAILURE_TEXT')){define('UPDATE_PASSWORD_FAILURE_TEXT', '密码更新失败！');};
        if (!defined('ROLE_CANNOT_DELETE_TEXT')){define('ROLE_CANNOT_DELETE_TEXT', '内置角色禁止删除！');};
        if (!defined('AUTH_GROUP_CANNOT_DELETE_TEXT')){define('AUTH_GROUP_CANNOT_DELETE_TEXT', '内置权限组禁止删除！');};
    }
}