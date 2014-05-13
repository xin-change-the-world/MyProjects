<?php
return array(
    'TITLE' => '后台管理系统',
    //'配置项'=>'配置值'
    'DB_DSN' => '', // 数据库连接DSN 用于PDO方式
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'tp_test', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '123456', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'think_', // 数据库表前缀 
    
    'SESSION_EXPIRE'=>'3600',
    
    'AUTH_CONFIG' => array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'think_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'think_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'think_auth_rule', //权限规则表
        'AUTH_USER' => 'think_user'//用户信息表
    )
); 