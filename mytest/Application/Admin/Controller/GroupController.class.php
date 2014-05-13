<?php
namespace Admin\Controller;
use Think\Controller;
use Think;

class GroupController extends \Home\Controller\CommonController {

    public function index(){
        
    	$Group = new \Admin\Model\AuthGroupModel();
        $data = $Group->order('title')->select();
        $this->assign("group", $data);

        $Rules = new \Admin\Model\AuthRuleModel();
        $rules = $Rules->order(' name, father_id,level')->select();
        $this->assign("rules", $rules);

        $Users = new \Admin\Model\UserModel();
        $users = $Users->order('id')->select();
        $this->assign("users", $users);

        $GroupAccess = new \Admin\Model\AuthGroupAccessModel();
        //$groupAccess = $GroupAccess->field('uid,group_id')->group('uid,group_id')->select();
        $ga = C('AUTH_CONFIG.AUTH_GROUP_ACCESS');
        $g = C('AUTH_CONFIG.AUTH_GROUP');
        $groupAccess = $GroupAccess->query("SELECT ga.uid, ga.group_id FROM $ga ga, $g g WHERE ga.group_id = g.id ");

        foreach($groupAccess as $g){
            $groupUser[$g['group_id']] = $groupUser[$g['group_id']].",".$g['uid'];
        }
        //print_r($groupAccess);
        foreach ($groupUser as $key => $value) {
            $groupUser[$key] = substr($value,1);
        }
        //print_r($groupUser);
        $this->assign("grouUser", $groupUser);

        $this->display();
    }

    public function edit(){

    	$Group = new \Admin\Model\AuthGroupModel();
        $data = I('post.form');
        $id = $data['id'];
        unset($data['id']);
        $result = $Group->where('id='.$id)->save($data); // 根据条件更新记录
        if($result === false){
            $this->error('更新失败，请重新修改！');
        }else{
            $this->success('更新成功', 'index');
        }
    }

    public function addGroup(){

        $Group = new \Admin\Model\AuthGroupModel();
        $data = I('post.form');
        $result = $Group->add($data); // 根据条件更新记录

        if($result){
            $this->success('新增成功', 'index');
        }else{
            $this->error('新增失败，请重新操作！');
        }
    }

    public function delGroup(){
        
        $id = (int)I('post.del_id');
        $Group = new \Admin\Model\AuthGroupModel();
        $reuslt = $Group->where('id='.$id)->delete(); // 删除id为5的用户数据
        
        if($result === false){
            $this->error('删除失败，请重新操作！');
        }else{
            $this->success('删除成功', 'Admin/Group/index');
        }
    }

    public function ruleAccess(){
        
        $Group = new \Admin\Model\AuthGroupModel();
        $id = I('post.group_id');
        $data['rules'] = I('post.group_rules');

        $result = $Group->where('id='.$id)->save($data); // 根据条件更新记录
        
        if($result === false){
            $this->error('更新失败，请重新修改！');
        }else{
            $this->success('更新成功', 'index');
        }
    }

    public function userGroup(){

        $id = I('u_group_id');
        $users = I('post.users');

        foreach($users as $u){
            $dataList[] = array('uid'=>$u,'group_id'=>$id);
        }
        
        $GroupAccess = new \Admin\Model\AuthGroupAccessModel();

        $resultDelete = $GroupAccess->where('group_id='.$id)->delete(); 
        
        if($resultDelete === false){
            $this->error('旧数据删除失败，请重新执行操作。');
        }
        $result = $GroupAccess->addAll($dataList,$options=array(),$replace=true);
        //echo $GroupAccess->getLastSql();die;
        if($result === false){
            $this->error('更新失败，请重新修改！');
        }else{
            $this->success('更新成功', 'index');
        }

    }
}