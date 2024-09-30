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
$route['default_controller'] = 'CIndex';
$route['update'] = 'CIndex/fetch_and_pull';
$route['getprovinsi'] = 'CIndex/getprovinsi';
$route['getsatkeraktif'] = 'CIndex/getsatkeraktif';
$route['getkabupaten/(:any)'] = 'CIndex/getkabupaten/$1';
$route['dispo'] = 'CIndex/dispo';
$route['disposisi_aksi'] = 'CIndex/disposisi_aksi';
$route['404_override'] = 'CIndex';
$route['translate_uri_dashes'] = TRUE;
$route['login'] = 'CLogin';
$route['login2'] = 'CLogin/login2';
$route['login/(:any)'] = "CLogin/$1";
$route['page/(:any)'] = "CIndex/$1";
$route['data'] = 'admin/CData';
$route['data/(:any)'] = "admin/CData/$1";
$route['data/(:any)/(:any)'] = "admin/CData/$1/$1";
$route['test'] = 'admin/CTest';
$route['test/(:any)'] = "admin/CTest/$1";
$route['test/(:any)/(:any)'] = "admin/CTest/$1/$1";
$route['permohonan'] = 'admin/CPermohonan';
$route['permohonan/(:any)'] = "admin/CPermohonan/$1";
$route['permohonan/(:any)/(:any)'] = "admin/CPermohonan/$1/$1";
$route['user'] = 'admin/CUser';
$route['kua'] = 'Kua';
$route['kua/(:any)'] = 'Kua/$1';
$route['referensi'] = 'Referensi';
$route['referensi/(:any)'] = 'Referensi/$1';
$route['user/(:any)'] = "admin/CUser/$1";
$route['user/getprofil/(:any)'] = 'admin/CUser/getProfilPegawai/$1';
$route['export'] = 'admin/CExport';
$route['export/(:any)'] = "admin/CExport/$1";
$route['grafik'] = 'admin/CGrafik';
$route['grafik/(:any)'] = "admin/CGrafik/$1";
$route['export'] = 'admin/CExport';
$route['export/(:any)'] = "admin/CExport/$1";
$route['export/(:any)/(:any)'] = "admin/CExport/$1/$1";
