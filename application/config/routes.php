<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



$route['pokemon/(:any)'] = 'pokemons/view/$1';
$route['pokemon'] = 'pokemons';

$route['register/(:any)'] = 'register/$1';
$route['register'] = 'register';

$route['login/(:any)'] = 'login/$1';
$route['login'] = 'login';

$route['logout'] = 'pokemons/logout';

$route['verifylogin/(:any)'] = 'verifylogin/$1';
$route['verifylogin'] = 'verifylogin';

$route['verifyregister/(:any)'] = 'verifyregister/$1';
$route['verifyregister'] = 'verifyregister';

$route['search'] = 'pokemons/search';

$route['mypokemon'] = 'pokemons/mypokemon';

$route['myfiles'] = 'myfiles';


$route['(:any)'] = 'pokemons/view/$1';
$route['default_controller'] = 'pokemons';

