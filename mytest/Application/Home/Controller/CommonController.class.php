<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    
    public function _initialize(){

    	if(session("userid")){
    		$name = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME;
        	\Think\Hook::listen('action_name', $name);
    	}else{
    		$this->error('您还没有登录，请登录后再进行操作！',__APP__.'/Home/Public/login',5);
    	}
    }
}