<?php
/**
 * 业务代码相关配置参数
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/1/27
 * Time: 2:07 PM
 */

return [

    //成功
    "success"               => 1,
    //错误
    "error"                 => 0,
    //方法找不到
    "action_not_found"      => -1,
    //控制器找不到
    "controller_not_found"  => -2,
    //登陆失败
    "not_login"             => -3,
    //用户已存在
    "userId_existing"       => -4,

    //mysqlstatus字段
    "mysql" =>[
        //用户登陆正常
        "table_normal"      => 1,
        //用户待审核
        "table_pedding"     => 0,
        //用户已经被删除
        "table_delete"      => 99,
    ],

    //验证短信Login
    "LoginCode" => [
        "Codebucunzai"      => -1009
    ],
];