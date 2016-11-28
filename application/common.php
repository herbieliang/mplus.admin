<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

namespace app\common;

class common{
    #region 获取唯一Id
    /**
     * 获取唯一Id
     * @return string
     */
    public static function get_uniqueness_id(){
        return uniqid(mt_rand(100, 999), false);
    }
    #endregion

    /**
     * 加密密码
     * @param $str
     * @return string
     */
    public static function encrypt_password($str){
        return md5(md5($str));
    }
}
