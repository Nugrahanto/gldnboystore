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
$route['default_controller'] = 'Dashboard';
$route['admin'] = 'Admin/dashboard';
$route['admin/product/add'] = "admin/product/add";
$route['admin/product/insert'] = "admin/product/insert";
$route['admin/product/doEdit'] = "admin/product/doEdit";
$route['admin/product/statusImage'] = "admin/product/statusImage";
$route['admin/product/(:any)/edit/(:any)'] = "admin/product/edit";
$route['admin/product/(:any)/detail/(:any)'] = "admin/product/detail";
$route['admin/product/(:any)'] = "admin/product/index/$1";
$route['admin/category/statusCategory'] = "admin/category/statusCategory";
$route['admin/category/statusSubCat'] = "admin/category/statusSubCat";
$route['admin/category/newcategory'] = "admin/category/newcategory";
$route['admin/category/(:any)'] = "admin/category/index/$1";

// User Routes
$route['collections'] = 'collections/collections_all';
$route['collections/sale'] = 'collections/sale';
$route['collections/(:any)'] = 'collections/index/$1';
$route['products'] = 'collections/collections_all';
$route['products/(:any)'] = 'collections/collections_detail/$1';
$route['collections/(:any)/products/(:any)'] = 'collections/collections_detail/$1';
$route['collections/(:any)/(:any)/products/(:any)'] = 'collections/collections_detail/$1';
$route['pages/contact-us'] = 'pages/contactus';
$route['pages/how-to-order'] = 'pages/howtoorder';
$route['pages/submitemail'] = 'pages/submitemail';
// $route['collections/(:any)/(:any)/(:any)'] = "collections/index/$1";
// $route['collections/(:any)/(:any)'] = "collections/index/$1";

$route['404_override'] = 'pages/notfound';
// $route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
