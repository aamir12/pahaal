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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Admin*/
/*login*/
$route['admin'] = 'Admin/login';

/*Profile*/
$route['update-admin'] = 'Admin/Profile/updateProfile';
$route['update-admin-password'] = 'Admin/Profile/changePassword';

/*Default Setting*/
$route['admin/default-setting'] = 'Admin/Default_setting';
$route['admin/update-site-identity'] = 'Admin/Default_setting/updateSiteIdentity';
$route['admin/update-menu'] = 'Admin/Default_setting/menuUpdate';
$route['admin/update-footer-content'] = 'Admin/Default_setting/footerContentUpdate';
$route['admin/update-payment-detail'] = 'Admin/Default_setting/paymentDetailUpdate';
$route['admin/update-social-media'] = 'Admin/Default_setting/socialMediaUpdate';
$route['admin/update-contact-detail'] = 'Admin/Default_setting/contactDetailsUpdate';
$route['admin/update-top-banner'] = 'Admin/Default_setting/topBannerUpdate';
$route['admin/update-loader'] = 'Admin/Default_setting/loaderUpdate';


/*Default Color Setting*/
$route['admin/default-color-setting'] = 'Admin/Default_color_setting';
$route['admin/update-color'] = 'Admin/Default_color_setting/updateColorSetting';

/*blog*/
$route['admin/blog-management'] = 'Admin/Blog';

/*Users*/
$route['admin/users-management'] = 'Admin/Users';

/*Category*/
$route['admin/category-management'] = 'Admin/Category';


/*Sub Category*/
$route['admin/subcategory-management'] = 'Admin/Subcategory';

/*coupon*/
$route['admin/coupon-management'] = 'Admin/Coupon';

/*product*/
$route['admin/all-products'] = 'Admin/Products';
$route['admin/add-product'] = 'Admin/Products/addProductPage';
$route['admin/get-subcategory'] = 'Admin/Products/get_all_subcategory';
$route['admin/edit-product/(:any)'] = 'Admin/Products/editProductPage/$1';

/*page content*/
$route['admin/home-setting'] = 'Admin/Page_setting';
$route['admin/slider-setting'] = 'Admin/Page_setting/sliderList';
$route['admin/banner-setting'] = 'Admin/Page_setting/updateHomeBanner';
$route['admin/heading-setting'] = 'Admin/Page_setting/headingContentUpdate';


$route['registration'] = 'home/registration';
/*Admin*/


/*Site*/
$route['blog'] = 'Site/Blog';
$route['blog_detail/(:num)'] = 'Site/Blog/Blog_detail/$1';

$route['shop'] = 'Site/Product';
$route['shop_detail/(:num)'] = 'Site/Product/Shop_detail';

/*Site*/


