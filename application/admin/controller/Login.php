<?php
/**
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/2/15
 * Time: 4:41 PM
 */

namespace app\admin\controller;


use app\admin\validate\AdminUser;
use think\cache\driver\Redis;
use app\admin\model\User;


class Login extends AdminBase
{
    protected $adminuser;
    protected $vaildata;

    public function initialize()
    {
        $this->adminuser = new User();
        if (!empty($this->isLogin())){
            return redirect(config("adminuser.admin_url").'/index/index',302)->send();
        }
    }

    public function index()
    {
//        tp5。1以上用于查看thinkphp版本
        //echo \think\facade\App::version();
//        $code = rand(100000,999999);
//        Cache::set("abc",$code,30);
//        $code2 = Cache::get("abc");
//        return $code2;
//        $redis = new Redis();
//        $redis->set("abc",123,60);
//        //halt($redis);
        //phpinfo();die;
        return $this->fetch();
    }

    public function check()
    {
        if (!$this->request->isPost()){
            return  apiArr(config("status.error") , "登陆方式错误！" , []);
        }


        $username = $this->request->param('username','','trim');
        $password = $this->request->param('password','','trim');
        //$verifyde = $this->request->param('verifyde','','trim');

        $this->vaildata = new AdminUser();
        $data = [
            "username" =>$username,
            "password" =>$password,
        ];
        if (!$this->vaildata->check($data)){
            return  apiArr(config("status.error") , $this->vaildata->getError());
        }

        try {
            $adminUser = new \app\admin\business\AdminUser();
            $result = $adminUser->login($data);
        }catch (\Exception $e){
            return  apiArr(config("status.error") , $e->getMessage());
        }


        if ($result){
            return apiArr(config("status.success") , "登陆成功！" , []);
        }

        return  apiArr(config("status.success") , "登陆成功！" , []);
    }


    public function logout()
    {
        session(config("adminuser.session_admin"),null);
        return redirect(config("adminuser.admin_url")."/login/index")->send();
    }
}