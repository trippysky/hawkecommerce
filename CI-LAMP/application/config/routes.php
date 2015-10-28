<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['edit_product/(:any)'] = "products/products/edit_product/$1";
$route['delete_product/(:any)'] = "products/products/delete_product/$1";
$route['show_products'] = "products/products/show_products";
$route['add_product'] = "products/products/add_product";
$route['products/category/showall'] = "customers/customers/show_all";
$route['products/show/(:any)'] = "customers/customers/show_product/$1";
$route['products/category/(:any)'] = "customers/customers/get_category_list/$1";
$route['customers'] = "customers/customers";
$route['products'] = "products/products";
$route['admins'] = "admins/admins";
$route['default_controller'] = "products/products";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */