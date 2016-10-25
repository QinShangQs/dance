<?php
return array (
		// '配置项'=>'配置值'
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => '192.168.12.248', // 服务器地址
		'DB_NAME' => 'dance', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => 'root', // 密码
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => 'sd_', // 数据库表前缀
		
		'MODULE_ALLOW_LIST' => array (
				'Dancer',
				'Apis' 
		),
		'DEFAULT_MODULE' => 'Dancer', // 默认模块
		'URL_MODEL' => 2, // URL模式
		'URL_CASE_INSENSITIVE' => true 
);