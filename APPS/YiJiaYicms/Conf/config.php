<?php
return array(
	//'配置项'=>'配置值'
        'URL_CASE_INSENSITIVE'  =>  true,
        'URL_MODEL' => 0,
        /* 数据库设置 */
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_NAME'               =>  'yijiayi',          // 数据库名
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'DB_PREFIX'             =>  'yiyi_',    // 数据库表前缀
        'DB_CHARSET'            =>  'utf8',     // 数据库编码默认采用utf8
        'TMPL_TEMPLATE_SUFFIX'=>'.php',//模板后缀
        'SHOW_PAGE_TRACE' =>FALSE,
        'TMPL_PARSE_STRING'=>array(
            'Css'=> '__PUBLIC__/JiCheng/css',
            'Javascript'=> '__PUBLIC__/JiCheng/javascript',
            'Images'=> '__PUBLIC__/JiCheng/images',
            'Tool'=> '__PUBLIC__/JiCheng/tool'
        )
);