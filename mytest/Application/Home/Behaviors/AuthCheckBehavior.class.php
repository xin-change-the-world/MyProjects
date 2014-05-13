<?php
namespace Home\Behaviors;

class AuthCheckBehavior extends \Think\Behavior{
    public function run(&$params) {

        $Auth = new \Think\Auth();

        //需要验证的规则列表,支持逗号分隔的权限规则或索引数组
        $name = $params;
        //当前用户id
        $uid = session('userid');
        
        //分类
        $type = MODULE_NAME;

        //执行check的模式
        $mode = 'url';

        //'or' 表示满足任一条规则即通过验证;
        //'and'则表示需满足所有规则才能通过验证
        $relation = 'and';


        if (!$Auth->check($name, $uid, $type, $mode, $relation)) {
            header("Content-Type:text/html;charset=utf-8"); 
            //redirect('', 5, '不好意思，您没有此节点的访问权限！');
            echo "
            <script charset='utf-8'>
                alert('您没有此节点的操作权限！');
                javascript:history.back(-1);
            </script>
            ";
            die;
        }
    }
}