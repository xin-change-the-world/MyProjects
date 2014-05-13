<?php
namespace Admin\Controller;
use Think\Controller;
use Think;

class UserController extends \Home\Controller\CommonController {

    public function index(){
    
    	$User = new \Admin\Model\UserModel();
        //$data = $User->order('username')->select();
        
        $table = C('AUTH_CONFIG');

        $data = $User->query("select u.id, u.username, g.title 
								from {$table['AUTH_USER']} u 
								left join {$table['AUTH_GROUP_ACCESS']}  ga on (u.id = ga.uid)  
								left join {$table['AUTH_GROUP']}  g on (g.id = ga.`group_id`);");
        $this->assign("user", $data);
        $this->display();
    }

    public function edit(){

    	$User = new \Admin\Model\UserModel();
        $data = I('post.form');
        $id = $data['id'];
        $d['username'] = $data['username'];
        $result = $User->where('id='.$id)->save($d); // 根据条件更新记录

        if($result === false){
            $this->error('更新失败，请重新修改！');
        }else{
            $this->success('更新成功', 'index');
        }
    }

    public function addUser(){

        $User = new \Admin\Model\UserModel();
        $data = I('post.form');
    	$data['password'] = md5($data['password']);

        $result = $User->add($data); // 根据条件更新记录

        if($result){
            $this->success('新增成功', 'index');
        }else{
            $this->error('新增失败，请重新操作！');
        }
    }

    public function delUser(){
        
        $id = (int)I('post.del_id');
        $User = new \Admin\Model\UserModel();
        $reuslt = $User->where('id='.$id)->delete(); // 删除id为5的用户数据
        
        if($result === false){
            $this->error('删除失败，请重新操作！');
        }else{
            $this->success('删除成功', 'Admin/User/index');
        }
    }

}