<?php
namespace Home\Controller;
use Think\Controller;
include("wechatext.class.php");
class IndexController extends Controller {
    public function index(){
		 $options = array(
		    'token'=>'tokenaccesskey', //填写你设定的key
		    'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
		    'appid'=>'wxdk1234567890', //填写高级调用功能的app id, 请在微信开发模式后台查询
		    'appsecret'=>'xxxxxxxxxxxxxxxxxxx' //填写高级调用功能的密钥
		    );
		 $weObj = new Wechat($options); //创建实例对象

		 $weObj->valid();//明文或兼容模式可以在接口验证通过后注释此句，但加密模式一定不能注释，否则会验证失败
			$type = $weObj->getRev()->getRevType();
			switch($type) {
			    case Wechat::MSGTYPE_TEXT:
			            $weObj->text("hello, I'm wechat")->reply();
			            exit;
			            break;
			    case Wechat::MSGTYPE_EVENT:
			            break;
			    case Wechat::MSGTYPE_IMAGE:
			            break;
			    default:
			            $weObj->text("help info")->reply();
			}
    }
    public function login(){
        $this->display();
    }
}