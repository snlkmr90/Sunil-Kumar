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

/*Backend*/

$route['adminaccess'] = 'admin/admin/adminaccess';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/logout'] = 'admin/admin/logout';
$route['admin/forgotpassword'] = 'admin/admin/forgotpassword';

/*Category*/
$route['admin/category/list-category'] = 'admin/category/list_category';
$route['admin/category/list-category/(:num)'] = 'admin/category/list_category/$1';
$route['admin/category/add-category'] = 'admin/category/add_category';
$route['admin/category/edit-category'] = 'admin/category/edit_category';
$route['admin/category/edit-category/(:num)'] = 'admin/category/edit_category/$1';
$route['admin/category/resetCategoryFilter'] = 'admin/admin/category/resetCategoryFilter';
/*--------*/

/*Posts*/
$route['post/list-post'] = 'admin/post/list_post';
$route['post/list-post/(:num)'] = 'admin/post/list_post/$1';
$route['post/add-post'] = 'admin/post/add_post';
$route['post/edit-post'] = 'admin/post/edit_post';
$route['post/edit-post/(:num)'] = 'admin/post/edit_post/$1';
$route['post/resetPostFilter'] = 'admin/post/resetPostFilter';
/*-----*/

/*Comments*/
$route['comments/list-comments'] = 'admin/comments/list_comments';
$route['comments/list-comments/(:num)'] = 'admin/comments/list_comments/$1';
$route['comments/update-comment/(:num)/(:num)'] = 'admin/comments/update_comment/$1/$2';
$route['comments/resetcommentfilter'] = 'admin/comments/resetcommentfilter';
/*-----*/

/*Contact*/
$route['contact/list-contact'] = 'admin/contact/list_contact';
$route['contact/list-contact/(:num)'] = 'admin/contact/list_contact/$1';
$route['contact/delete-contact/(:num)'] = 'admin/contact/delete_contact/$1';
$route['contact/view-contact/(:num)'] = 'admin/contact/view_contact/$1';
$route['contact/resetcontactfilter'] = 'admin/contact/resetcontactfilter';
/*-----*/

/*Writeus*/
$route['writeus/list-writeus'] = 'admin/writeus/list_writeus';
$route['writeus/list-writeus/(:num)'] = 'admin/writeus/list_writeus/$1';
$route['writeus/delete-writeus/(:num)/(:num)'] = 'admin/writeus/delete_writeus/$1/$2';
$route['writeus/view-writeus/(:num)'] = 'admin/writeus/view_writeus/$1';
$route['writeus/resetwriteusfilter'] = 'admin/writeus/resetwriteusfilter';
/*-----*/

/*----------*/

/*Frontend*/
/*for category dynamic urls*/
require_once(BASEPATH .'database/DB'. EXT);
$db =& DB();
$query = $db->get( 'blog_category' );
$result = $query->result();
 //echo"<pre>";print_r($result);exit;
foreach( $result as $row )
{
	if(stripos($row->cat_slug, '-')){
		$controllerName = str_replace('-', '_', $row->cat_slug);
	}else{
		$controllerName = $row->cat_slug;
	}
    $route[ $row->cat_slug ]                 = $controllerName;
    $route[ $row->cat_slug.'/(:num)' ]       = $controllerName.'/$1';
}
/*for category dynamic urls*/
/*--------*/


$route['default_controller'] = 'home';
$route['(:num)'] = 'home/index/$1';
$route['category/(:any)'] = 'category/index/$1';
$route['blog/(:any)'] = 'blog/index/$1';
$route['postcomment'] = 'home/postcomment';
$route['save-contact'] = 'home/save_contact';
$route['save-writeus'] = 'home/save_writeus';
$route['write-for-us'] = 'home/write_for_us';
$route['contact-us'] = 'home/contact_us';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;