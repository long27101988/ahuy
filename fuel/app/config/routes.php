<?php
return array(
	'_root_'  => 'index/index',
	'gioi-thieu'  => 'page/intro',
	'san-pham'  => 'product/index',
	'san-pham/thanh-toan' => 'product/payment',
	'san-pham/:alias'  => 'product/detail/$1',
	'san-pham/add-shopping' => 'product/addshop',
	'tin-tuc'  => 'news/index',
	'tin-tuc/tags/:alias'  => 'news/tags/$1',
	'tin-tuc/:alias'  => 'news/detail/$1',
	'dich-vu'  => 'service/index',
	'dich-vu/tags/:alias'  => 'service/tags/$1',
	'dich-vu/:alias'  => 'service/detail/$1',
	'du-an'  => 'project/index',
	'du-an/:alias'  => 'project/detail/$1',
	'lien-he'  => 'contact',
	'auth'  => 'auth/login',
	'register' => 'auth/createuser',
	'_404_'   => 'welcome/404',    // The main 404 route

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
