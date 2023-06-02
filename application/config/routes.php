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
$route['default_controller'] = 'welcome';
$route['login'] = 'admin/login';
$route['admin'] = 'admin/dashboard';
$route['index.html'] = 'welcome/index';
$route['about.html'] = 'welcome/about';
$route['team.html'] = 'welcome/team';
$route['division.html'] = 'welcome/division';
$route['contact.html'] = 'welcome/contactus';

$route['software_development_services.html'] = 'welcome/software_development_services';
$route['web_development_services.html'] = 'welcome/web_development_services';
$route['website_design_services.html'] = 'welcome/website_design_services';
$route['search_engine_optimization.html'] = 'welcome/search_engine_optimization';
$route['social_media_marketing_services.html'] = 'welcome/social_media_marketing_services';
$route['ppc_services.html'] = 'welcome/ppc_services';
$route['content_writing_services.html'] = 'welcome/content_writing_services';
$route['email_marketing_services.html'] = 'welcome/email_marketing_services';
$route['project_detail.html'] = 'welcome/project_detail';
$route['blog_single.html'] = 'welcome/blog_single';


$route['blog/(:any).html'] = 'welcome/blog/$1';
$route['blog.html'] = 'welcome/all_blog';
$route['category/(:any).html'] = 'welcome/category/$1';
$route['(:any)/(:any).html'] = 'welcome/product/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
