<?php
/**
 * 角色模型
 * User: Zachary Liang
 * Date: 16-11-26
 * Time: 下午2:15
 */

namespace app\manage\model;
use think\Model;

/**
 * Class AuthGroup
 * @package app\common\model
 */
class AuthGroup extends Model
{
    protected $insert = ['rules', 'status'];
    protected $update = ['rules', 'status'];

    public function setRulesAttr($value){
        $rules_str = implode(',', $value);
        return rtrim($rules_str, ',');
    }

    protected function setStatusAttr($value){
        return $value === 'on' ? 1 : 0;
    }

    /**
     * 获取权限文本内容
     * @param $value
     * @param $data
     * @return string
     */
    public function getRulesNameAttr($value, $data){
        $result = db('auth_rule')
            ->where('id', 'IN', $data['rules'])
            ->field('title')
            ->select();
        $rules = array();
        foreach ($result as $item){
            $rules[] = $item['title'];
        }
        return implode('、', $rules);
    }
}