<?php
/**
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/3/5
 * Time: 1:52 PM
 */

namespace app\admin\validate;


use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require',
        'password' => 'require|min:6',
        //'verifyde' => 'require|checkVerif',
    ];

    protected $message = [
        'username' => '用户名必须',
        'password' => '密码必须',
        'password.min' => '密码不得小于6位',
        //'verifyde' => '验证码必须',
    ];

    protected $scene = [
        'login' => ['username','password']
    ];
//    protected function checkVerif($value ,$rule ,$date=[]){
//        if (!captcha_check($value)){
//            return   "验证码不正确！";
//        }
//        return true;
//    }
}