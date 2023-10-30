<?php 

$router->get(
	'/user/register',
	'App\Controllers\Customer\RegisterController@create'
);
$router->post(
	'/user/register',
	'App\Controllers\Customer\RegisterController@store'
);
$router->get(
	'/user/signin',
	'App\Controllers\Customer\SigninController@create'
);
$router->post(
	'/user/signin',
	'App\Controllers\Customer\SigninController@store'
);
$router->get(
	'/user/profile',
	'App\Controllers\Customer\ProfileController@edit'
);
$router->post(
	'/user/profile',
	'App\Controllers\Customer\ProfileController@update'
);
$router->get(
	'/user/logout',
	'App\Controllers\Customer\SigninController@destroy'
);