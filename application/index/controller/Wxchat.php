<?php
namespace app\index\controller;

use think\Controller;
use think\congif;
use think\Session;
use app\common\model\mysql\index\Openiduser;

class Wxchat extends Controller
{

    protected $session;
    protected $openid;

    public function initialize()
    {
        $this->session = new Session();
        $this->openid = new Openiduser();
    }

    /**
     * @return mixed
     * 判断openid是否为空，进行答题页面操作
     */
    public function index()
    {
        //取一下session中的openid
        $res = $this->session->get('openid');

        if (empty($res)){
            $openid = $this->getOpenid();
            if (!$openid){
                return $this->fetch('index');
            }
        }else{

            $users = $this->openid->where(['openid'=>$res])->find();

            if ($users){

                /**
                 * 如果库里有openid，直接进行自己数据处理，比如跳转、等等操作
                 */

            }else{

                $result = $this->openid->save(['openid'=>$res]);
                if ($result){
                    redirect(config("Wxchat.index_url")."/index/index")->send();
                }else{
                    /**
                     * 没有存储成功
                     */
                }
            }
        }
    }

    /**
    获取code加openid入库
     */
    public function getOpenid()
    {
        if(isset($_GET['code'])){

            $code = $_GET["code"];

            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".config("Wxchat.Wxchat.appid")."&secret=".config("Wxchat.Wxchat.secret")."&code=$code&grant_type=authorization_code";

            $content=file_get_contents($url);

            $open=json_decode($content,true);
            $openid = $open['openid'];

            $indexUrl = "https://www.baidu.com";

            $this->session->set('openid',$openid);
            return redirect($indexUrl,302)->send();

        }else{
            $APPID=config("Wxchat.Wxchat.appid");

            $REDIRECT_URI='http://asdasdasd.sdasda.sdaw.com/index/index/getOpenid';
            $scope='snsapi_base';

            $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$APPID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$scope.'&state=#wechat_redirect';
            header("Location:".$url);exit();
        }
    }

}
