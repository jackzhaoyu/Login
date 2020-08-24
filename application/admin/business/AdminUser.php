<?php
/**
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/3/10
 * Time: 9:26 AM
 */

namespace app\admin\business;

use app\common\model\mysql\admin\User;
use think\Exception;

class AdminUser
{
    public $adminUserObj = null;

    public function __construct()
    {
        $this->adminUserObj = new User();
    }

    public function login($data)
    {
        $adminUser = $this->adminUserObj->getAdminUserByUsername($data['username']);

        if (!$adminUser){
            throw new Exception("用户不存在！");
        }
        if ($adminUser['password'] != md5($data['password'])){
            throw new Exception("密码错误！");
        }
        $updataAdmin = [
            'last_login_time' =>time(),
            'last_login_ip'   =>request()->ip(),
            'update_time'   =>time(),
        ];
        //根据主键ID更新源
        $res = $this->adminUserObj->save($updataAdmin,['id'=>$adminUser['id']]);

        if (empty($res)){
            //return  apiArr(config("status.error") , "登陆异常！");
            throw new Exception("登陆异常！");

        }
        //halt($adminUser);
        session(config('adminuser.session_admin'),$adminUser);

        return  true;
    }

    /**
     * @getAdminUserByUsername：根据用户名查询管理员数据
     * @param $username:传递过来的用户名
     * @return array|bool|null|\think\Model ：管理员model
     */
    public function getAdminUserByUsername($username)
    {
        $user = $this->adminUserObj->getAdminUserByUsername($username);
        if (empty($user) || $user['status'] != config("status.mysql.table_normal")){
            return [];
        }
        $user = $user->toArray();
        return $user;
    }
}