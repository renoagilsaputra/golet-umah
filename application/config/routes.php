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
$route['default_controller'] = 'home';
$route['about'] = 'home/about';
$route['contact'] = 'home/contact';

//auth
$route['register/user'] = 'auth/register_user';
$route['register/pemilik'] = 'auth/register_pemilik';

//admin
$route['admin'] = 'admin';
//admin-perumahan
$route['admin/perumahan'] = 'admin/perumahan';
$route['admin/perumahan/edit/(:any)'] = 'admin/perumahan_edit/$1';
//admin-rumah
$route['admin/rumah'] = 'admin/rumah';
$route['admin/rumah/edit/(:any)'] = 'admin/rumah_edit/$1';
//admin-user
$route['admin/user'] = 'admin/user';
$route['admin/user/edit/(:any)'] = 'admin/user_edit/$1';
$route['admin/user/changepassword/(:any)'] = 'admin/changepassword/$1';
//admin-activity-log
$route['admin/activity-log'] = 'admin/actl';
//admin-bukutamu
$route['admin/bukutamu'] = 'admin/bukutamu';

//pemilik
$route['pemilik'] = 'pemilik';
//pemilik-perumahan
$route['pemilik/perumahan'] = 'pemilik/perumahan';
$route['pemilik/perumahan/edit/(:any)'] = 'pemilik/perumahan_edit/$1';
//pemilik-rumah
$route['pemilik/rumah'] = 'pemilik/rumah';
$route['pemilik/rumah/edit/(:any)'] = 'pemilik/rumah_edit/$1';
//pemilik-bukutamu
$route['pemilik/bukutamu'] = 'pemilik/bukutamu';


//pemilik-user
$route['pemilik/user'] = 'pemilik/user';
$route['pemilik/user/edit/(:any)'] = 'pemilik/user_edit/$1';


//user
$route['user'] = 'user';
$route['user/perumahan/(:any)'] = 'user/perumahan/$1';
$route['user/send/transaksi/(:any)/(:any)/(:any)/(:any)'] = 'user/send_transaksi/$1/$2/$3/$4';
$route['user/contact'] = 'user/contact';
$route['user/profile'] = 'user/profile';
$route['user/profile/edit/(:any)'] = 'user/profile_edit/$1';
$route['user/changepassword/(:any)'] = 'user/changepassword/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
