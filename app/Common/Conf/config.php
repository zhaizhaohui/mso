<?php
return [
	/* 数据库配置 */
	'DB_TYPE'   => 'mysql',
	'DB_HOST'   => 'localhost',
	'DB_NAME'   => 'mso',
	'DB_USER'   => 'root',
	'DB_PWD'    => 'root',
	'DB_PORT'   => 3306,
	'DB_PREFIX' => 'm_',
	'DB_CHARSET'=> 'utf8',
	'DB_DEBUG'  =>  true,
	
	/* 默认分组 */
	'DEFAULT_MODULE'     => 'Home',
	'DEFAULT_CONTROLLER'    =>  'index',
	'DEFAULT_ACTION'        =>  'index',

	/* URL设置 */
	'URL_CASE_INSENSITIVE'  => true,
	'URL_MODEL'             => 2,
	'URL_HTML_SUFFIX'=>'',
	'URL_ROUTER_ON'   => true,

	/* 调试信息 */
	'SHOW_PAGE_TRACE' => false,
	'SHOW_ERROR_MSG'  => true,

	/* 加载扩展 */
	'LOAD_EXT_FILE' => 'extend',

	/*图片上传设置*/
	'UP_IMG' => [
		'root' => './data/',
		'tmp'  => 'tmp/',
		'save' => 'imgs/'
	],

	/* 资源目录 */
	'TMPL_PARSE_STRING'=> [
		'__HOST__'=> __HOST__,
		'__CSS__' => __HOST__.'/zui/css',
		'__JS__'  => __HOST__.'/zui/js',
		'__IMG__' => __HOST__.'/zui/img',
    	'__LIBS__'=> __HOST__.'/libs'
    ]
];