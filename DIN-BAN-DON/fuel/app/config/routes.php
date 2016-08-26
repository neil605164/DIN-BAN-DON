<?php
return array(
	'_root_'  => 'board/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

	'login' => 'user/login',
	'logout' => 'user/logout',
	'register' => 'user/register',
	'store' => 'insert/store',
	'menu' => 'insert/menu',
	'view/:id' => 'insert/view',
	'show_store' => 'insert/show_store',
	'delete' => 'insert/delete',
	'create' => 'board/create',
	'member_add/:id' => 'board/member_add',
	'order/:id' => 'board/order',
	'delete/:id' => 'board/delete',
 
);
