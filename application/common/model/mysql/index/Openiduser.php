<?php
/**
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/2/2
 * Time: 12:41 PM
 */
namespace app\common\model\mysql\index;

use think\Model;

class Openiduser extends Model
{

    /**
     * 自动更新写入时间
     * 表中必须有create_time和update_time
     * @var bool
     */
    //protected $autoWriteTimestamp = true;
    //protected $table = "gtc_user";
    /**
     * 根据用户名获取用户数据
     * @param $username
     * @return array|bool|null|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getAdminUserByUsername($username)
    {
        if (empty($username)){
            return false;
        }

        $where = [
            'username' => trim($username),
        ];
        $result = $this->where($where)->find();

        return $result;

    }

    /**
     * 根据用户名查看是否用户
     * @param $username
     * @return array|bool|null|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getUserByUsername($username)
    {
        if (empty($username)){
            return false;
        }

        $where = [
            'username' => trim($username),
        ];
        $result = $this->where($where)->find();
        return $result;

    }

    /**
     * 根据id获取用户信息
     * @param $id
     * @return array|bool|null|Model
     * @throws \think\db\exception\DataNotFoundException
     */
    public function getUserById($id){
        $id = intval($id);
        if (empty($id)){
            return false;
        }
        return $this->find($id);
    }


}