<?php
return array(
	//URL重写
	'URL_MODEL' => '2',

	//模块部署
	'MODULE_ALLOW_LIST' => array('Home', 'Ehome', 'Mobile', 'Emobile', 'Admin'),
	'DEFAULT_MODULE' => 'Home', // 默认模块

	//数据库配置
	'DB_TYPE' => 'sqlite', // 数据库类型
	'DB_HOST' => '127.0.0.1', // 服务器地址
	'DB_NAME' => './DB/KYJD.db3', // 数据库名
	'DB_PORT' => 3306, // 端口
	'DB_PREFIX' => 'db_', // 数据库表前缀
	'DB_CHARSET' => 'utf8', // 字符集
	'DB_DEBUG' => true, // 数据库调试模式 开启后可以记录SQL日志
);