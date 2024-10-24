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

//route for Language
$route['english']  = 'home/set_english';
$route['french'] = 'home/set_french';

$route['404_override'] = 'auth/error_404';
$route['translate_uri_dashes'] = FALSE;

// front route
$route['login']         = 'auth/index';
$route['register']      = 'auth/register';
$route['profile']       = 'home/profile';
$route['about']         = 'home/about';
$route['mission']         = 'home/mission';
$route['business']         = 'home/business';
$route['management']         = 'home/management';
$route['why-us']         = 'home/why_us';
$route['quality-policy']         = 'home/quality_policy';
$route['client-satisfaction']         = 'home/client_satisfaction';
$route['global-pressance']         = 'home/global_pressance';
$route['manufacturing']         = 'home/manufacturing';
$route['packaging']         = 'home/packaging';
$route['research-development']         = 'home/research_development';
$route['category/finished-product']         = 'home/product';

$route['category/(:any)']         = 'product/category/$1';
$route['category/finished/(:any)']         = 'product/category_details/$1';


$route['contract-manufacturing']         = 'home/contract_manufacturing';
$route['third-party-manufacturing']         = 'home/third_party_manufacturing';
$route['institutional-tenders']         = 'home/institutional_tenders';
$route['generic-medicines']         = 'home/generic_medicines';
$route['otc-products']         = 'home/otc_products';
$route['regulatory-service']         = 'home/regulatory_service';
$route['quality-control-and-quality-assurance']         = 'home/quality_control_assurance';
$route['product-gallery']       = 'home/gallery';
$route['blog']       = 'home/blog';
$route['marketing']       = 'home/marketing';
$route['career']       = 'home/career';
$route['certificate']       = 'home/certificate';



$route['contact-us']       = 'home/contact';
$route['logout']        = 'home/logout';
$route['privacy']       = 'home/privacy';
// $route['faq']           = 'home/faq';


// route for backend
$route['backend'] = 'backend/auth/login';
$route['backend/login'] = 'backend/auth/login';
$route['backend/logout'] = 'backend/auth/logout';
$route['backend/dashboard'] = 'backend/admin/dashboard';
$route['backend/access_denied'] = 'backend/admin/access_denied';

$route['backend/profile'] = 'backend/admin/profile';
$route['backend/change-login-password'] = 'backend/admin/change_login_password';
$route['backend/system-setting'] = 'backend/admin/system_setting';
$route['backend/company-profile'] = 'backend/admin/company_profile';
$route['backend/privacy-setting'] = 'backend/admin/privacy';


$route['backend/users/edit/(:any)'] = 'backend/users/add/$1';
$route['backend/user_role/edit/(:any)'] = 'backend/user_role/add/$1';
$route['backend/languages/edit/(:any)'] = 'backend/languages/add/$1';