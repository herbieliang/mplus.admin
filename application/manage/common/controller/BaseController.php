<?php
/**
 * 控制器基类
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午12:56
 */

namespace app\manage\common\controller;
use phpDocumentor\Reflection\Types\Array_;
use think\Config;
use think\Controller;

/**
 * Class BaseController
 * @package app\manage\common\controller
 */
class BaseController extends Controller
{
    protected $data;

    protected function _initialize()
    {
        parent::_initialize();
        $this->data['resource_path'] = Config::get('RESOURCE_PATH');
    }

}