<?php
return array(
	//'配置项'=>'配置值'
	//模板设置
	'TMPL_ENGINE_TYPE' => 'Smarty' ,
	'TMPL_CACHE_ON' => false ,	
     //URL伪静态
	'URL_HTML_SUFFIX' => 'html',
	//本地数据库
	'DB_TYPE' => 'mysql',
	'DB_HOST' => '192.168.1.104',
	'DB_NAME' => 'inventory',
	'DB_USER' => 'root',
	'DB_PWD' => 'root',
	'DB_PORT' => 8889,
	'DB_PREFIX' => 'im_',
	'SESSION_AUTO_START' => true,
	
	'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
	'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
);