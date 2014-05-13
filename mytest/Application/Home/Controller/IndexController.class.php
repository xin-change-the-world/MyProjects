<?php
namespace Home\Controller;
use Think\Controller;

class IndexController  extends \Home\Controller\CommonController{
    public function index(){
    	$Auth = new \Think\Auth();

        //需要验证的规则列表,支持逗号分隔的权限规则或索引数组
        $name = MODULE_NAME . '/' . ACTION_NAME;
        //当前用户id
        $uid = '1';
        
        //分类
        $type = MODULE_NAME;

        //执行check的模式
        $mode = 'url';

        //'or' 表示满足任一条规则即通过验证;
        //'and'则表示需满足所有规则才能通过验证
        $relation = 'and';


        if ($Auth->check($name, $uid, $type, $mode, $relation)) {
            //print('认证：成功');
        } else {
            //print('认证：失败');
        }

        $this->display();
    }

    public function menu(){
        //获取用户拥有的模块权限
        $module = session('authModule');
        $num = count($module)-1;//显示的模块个数（总数减1）
        if($num > 5) {
            $num = 5; //设置最多显示五个
        }elseif ($num == 0) {
            $num = 1;
            $module = array('0' => '您没有模块权限！', );
        }
        
        $this->assign("num", $num);
        $this->assign("authModule", $module);
        $this->display();
        
    }

    public function add(){
$Auth = new \Think\Auth();

        //需要验证的规则列表,支持逗号分隔的权限规则或索引数组
        $name = MODULE_NAME . '/' . ACTION_NAME;
        //当前用户id
        $uid = '1';
        
        //分类
        $type = MODULE_NAME;

        //执行check的模式
        $mode = 'url';

        //'or' 表示满足任一条规则即通过验证;
        //'and'则表示需满足所有规则才能通过验证
        $relation = 'and';


        if ($Auth->check($name, $uid, $type, $mode, $relation)) {
            die('认证：成功');
        } else {
            die('认证：失败');
        }

    }

    public function edit(){
$Auth = new \Think\Auth();

        //需要验证的规则列表,支持逗号分隔的权限规则或索引数组
        $name = MODULE_NAME . '/' . ACTION_NAME;
        //当前用户id
        $uid = '1';
        
        //分类
        $type = MODULE_NAME;

        //执行check的模式
        $mode = 'url';

        //'or' 表示满足任一条规则即通过验证;
        //'and'则表示需满足所有规则才能通过验证
        $relation = 'and';


        if ($Auth->check($name, $uid, $type, $mode, $relation)) {
            die('认证：成功');
        } else {
            die('认证：失败');
        }

    }

    public function delete(){
$Auth = new \Think\Auth();

        //需要验证的规则列表,支持逗号分隔的权限规则或索引数组
        $name = MODULE_NAME . '/' . ACTION_NAME;
        //当前用户id
        $uid = '1';
        
        //分类
        $type = MODULE_NAME;

        //执行check的模式
        $mode = 'url';

        //'or' 表示满足任一条规则即通过验证;
        //'and'则表示需满足所有规则才能通过验证
        $relation = 'and';


        if ($Auth->check($name, $uid, $type, $mode, $relation)) {
            die('认证：成功');
        } else {
            die('认证：失败');
        }
    }
}