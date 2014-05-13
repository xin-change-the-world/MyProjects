<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    
    public function login(){

        if(session("userid")){
            $this->success("您已经登录了！", "../../Home/Index/menu");
        }
        if(IS_POST){

            $User = new \Home\Model\UserModel();
            $username = I("post.username");
            $data = $User->where("username='{$username}'")->find();

            if(md5(I("post.password")) == $data['password']){
                // 登录成功，存储session
                session('username', $username);
                session('userid',   $data['id']);
                //读取该用户拥有的模块
                $Auth = new \Think\Auth();
                session('authModule',$Auth->getAuthType($data['id']));
                $authList = $Auth->getAuth($data['id']);
                
                $newAuthList = array();
                foreach($authList as $a){
                    $newAuthList[$a['father_id']][$a['name']] = $a;
                }
                session('menu',$newAuthList);
                
                $this->success("登录成功", __APP__."/Home/Index/menu");
                die;
            }else{
                
                $this->assign('username',$username);
                $this->error('认证失败，请重新登录。');
            }
        }

        $this->display();
    }

    public function logout(){

        session(null);
        $this->success("退出成功", "login");
    }
}