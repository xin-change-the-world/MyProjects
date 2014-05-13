<?php
namespace Admin\Controller;
use Think\Controller;
use Think;

class IndexController extends \Home\Controller\CommonController {

    public function index(){
    
    	$Rule = new \Admin\Model\AuthRuleModel();
        $data = $Rule->order(' name, father_id,level')->select();

        $this->assign("rule", $data);
        $this->display();
    }

    public function edit(){

        $Rule = new \Admin\Model\AuthRuleModel();
        $data = I('post.form');
        $id = $data['id'];
        unset($data['id']);
        $result = $Rule->where('id='.$id)->save($data); // 根据条件更新记录
        if($result === false){
            $this->error('更新失败，请重新修改！');
        }else{
            $this->success('更新成功', 'index');
        }
    }

    public function addRule(){

        $Rule = new \Admin\Model\AuthRuleModel();
        $data = I('post.form');

        $result = $Rule->add($data); // 根据条件更新记录

        if($result){
            $this->success('新增成功', 'index');
        }else{
            $this->error('新增失败，请重新操作！');
        }
    }

    public function delRule(){
        
        $id = (int)I('post.del_id');
        $Rule = new \Admin\Model\AuthRuleModel();
        $reuslt = $Rule->where('id='.$id)->delete(); // 删除id为5的用户数据
        
        if($result === false){
            $this->error('删除失败，请重新操作！');
        }else{
            $this->success('删除成功', 'index');
        }
    }
}