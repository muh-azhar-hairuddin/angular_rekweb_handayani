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


/***** ADMIN *****/
/*Home*/
$route['admin_home'] = 'admin_home';
$route['admin_home/dashboard'] = 'admin_home/dashboard';
/*End Home*/

/*Data Register Ibu Hamil*/
$route['admin_data_kohort'] = 'admin_data_kohort';
$route['admin_data_kohort/add'] = 'admin_data_kohort/add';
$route['admin_data_kohort/edit'] = 'admin_data_kohort/edit';
$route['admin_data_kohort/detail'] = 'admin_data_kohort/detail';
$route['admin_data_kohort/cari_no_ktp'] = 'admin_data_kohort/cari_no_ktp';
$route['admin_data_kohort/get_data_kohort'] = 'admin_data_kohort/get_data_kohort';
$route['admin_data_kohort/simpan'] = 'admin_data_kohort/simpan';
$route['admin_data_kohort/cari_kohort'] = 'admin_data_kohort/cari_kohort';
$route['admin_data_kohort/hapus'] = 'admin_data_kohort/hapus';
/*End Data Register Ibu Hamil*/

/*Data Pasien*/
$route['admin_data_pasien'] = 'admin_data_pasien';
$route['admin_data_pasien/get_data_pasien'] = 'admin_data_pasien/get_data_pasien';
$route['admin_data_pasien/simpan'] = 'admin_data_pasien/simpan';
$route['admin_data_pasien/simpan_account'] = 'admin_data_pasien/simpan_account';
$route['admin_data_pasien/cari_pasien'] = 'admin_data_pasien/cari_pasien';
$route['admin_data_pasien/cari_account'] = 'admin_data_pasien/cari_account';
$route['admin_data_pasien/hapus'] = 'admin_data_pasien/hapus';
/*End Data Pasien*/

/*Data Admin*/
$route['admin_data_admin'] = 'admin_data_admin';
$route['admin_data_admin/get_data_admin'] = 'admin_data_admin/get_data_admin';
$route['admin_data_admin/simpan'] = 'admin_data_admin/simpan';
$route['admin_data_admin/simpan_account'] = 'admin_data_admin/simpan_account';
$route['admin_data_admin/cari_admin'] = 'admin_data_admin/cari_admin';
$route['admin_data_admin/cari_account'] = 'admin_data_admin/cari_account';
$route['admin_data_admin/hapus'] = 'admin_data_admin/hapus';
/*End Data Admin*/

/*Data Laporan*/
$route['admin_lap_kohort_ibu_hamil'] = 'admin_lap_kohort_ibu_hamil';
$route['admin_lap_kohort_ibu_hamil/cetak'] = 'admin_lap_kohort_ibu_hamil/cetak';
$route['admin_lap_kohort_persalinan'] = 'admin_lap_kohort_persalinan';
$route['admin_lap_kohort_persalinan/cetak'] = 'admin_lap_kohort_persalinan/cetak';
$route['admin_lap_kohort_nifas'] = 'admin_lap_kohort_nifas';
$route['admin_lap_kohort_nifas/cetak'] = 'admin_lap_kohort_nifas/cetak';
$route['admin_lap_kohort_bayi'] = 'admin_lap_kohort_bayi';
$route['admin_lap_kohort_bayi/cetak'] = 'admin_lap_kohort_bayi/cetak';
/*End Laporan*/


/**** BIDAN *****/
/*Home*/
$route['bidan_home'] = 'bidan_home';
$route['bidan_home/dashboard'] = 'bidan_home/dashboard';
/*End Home*/

/*Data Register Ibu Hamil*/
$route['bidan_data_kohort'] = 'bidan_data_kohort';
$route['bidan_data_kohort/add'] = 'bidan_data_kohort/add';
$route['bidan_data_kohort/edit'] = 'bidan_data_kohort/edit';
$route['bidan_data_kohort/detail'] = 'bidan_data_kohort/detail';
$route['bidan_data_kohort/cari_no_ktp'] = 'bidan_data_kohort/cari_no_ktp';
$route['bidan_data_kohort/get_data_kohort'] = 'bidan_data_kohort/get_data_kohort';
$route['bidan_data_kohort/simpan'] = 'bidan_data_kohort/simpan';
$route['bidan_data_kohort/cari_kohort'] = 'bidan_data_kohort/cari_kohort';
/*End Data Register Ibu Hamil*/

/*Data Pasien*/
$route['bidan_data_pasien'] = 'bidan_data_pasien';
$route['bidan_data_pasien/get_data_pasien'] = 'bidan_data_pasien/get_data_pasien';
$route['bidan_data_pasien/simpan'] = 'bidan_data_pasien/simpan';
$route['bidan_data_pasien/simpan_account'] = 'bidan_data_pasien/simpan_account';
$route['bidan_data_pasien/cari_pasien'] = 'bidan_data_pasien/cari_pasien';
$route['bidan_data_pasien/cari_account'] = 'bidan_data_pasien/cari_account';
/*End Data Pasien*/


/*** KEPALA ****/
/*Home*/
$route['kepala_home'] = 'kepala_home';
$route['kepala_home/dashboard'] = 'kepala_home/dashboard';
/*End Home*/

/*Data Register Ibu Hamil*/
$route['kepala_data_kohort'] = 'kepala_data_kohort';
$route['kepala_data_kohort/add'] = 'kepala_data_kohort/add';
$route['kepala_data_kohort/edit'] = 'kepala_data_kohort/edit';
$route['kepala_data_kohort/detail'] = 'kepala_data_kohort/detail';
$route['kepala_data_kohort/cari_no_ktp'] = 'kepala_data_kohort/cari_no_ktp';
$route['kepala_data_kohort/get_data_kohort'] = 'kepala_data_kohort/get_data_kohort';
$route['kepala_data_kohort/simpan'] = 'kepala_data_kohort/simpan';
$route['kepala_data_kohort/cari_kohort'] = 'kepala_data_kohort/cari_kohort';
$route['kepala_data_kohort/hapus'] = 'kepala_data_kohort/hapus';
/*End Data Register Ibu Hamil*/

/*Data Laporan*/
$route['kepala_lap_kohort_ibu_hamil'] = 'kepala_lap_kohort_ibu_hamil';
$route['kepala_lap_kohort_ibu_hamil/cetak'] = 'kepala_lap_kohort_ibu_hamil/cetak';
$route['kepala_lap_kohort_persalinan'] = 'kepala_lap_kohort_persalinan';
$route['kepala_lap_kohort_persalinan/cetak'] = 'kepala_lap_kohort_persalinan/cetak';
$route['kepala_lap_kohort_nifas'] = 'kepala_lap_kohort_nifas';
$route['kepala_lap_kohort_nifas/cetak'] = 'kepala_lap_kohort_nifas/cetak';
$route['kepala_lap_kohort_bayi'] = 'kepala_lap_kohort_bayi';
$route['kepala_lap_kohort_bayi/cetak'] = 'kepala_lap_kohort_bayi/cetak';
/*End Laporan*/


/*End Laporan*/



/*/*Login*/
$route['login'] = 'login';
$route['cek_login'] = 'login/cek_login';
$route['logout'] = 'login/logout';
/*End Login*/


/*** USER ****/
/*Home*/
$route['user_home'] = 'user_home';
$route['user_home/dashboard'] = 'user_home/dashboard';
/*End Home*/

/*Data Register Ibu Hamil*/
$route['user_data_kohort'] = 'user_data_kohort';
$route['user_data_kohort/add'] = 'user_data_kohort/add';
$route['user_data_kohort/edit'] = 'user_data_kohort/edit';
$route['user_data_kohort/detail'] = 'user_data_kohort/detail';
$route['user_data_kohort/cari_no_ktp'] = 'user_data_kohort/cari_no_ktp';
$route['user_data_kohort/get_data_kohort'] = 'user_data_kohort/get_data_kohort';
$route['user_data_kohort/simpan'] = 'user_data_kohort/simpan';
$route['user_data_kohort/cari_kohort'] = 'user_data_kohort/cari_kohort';
$route['user_data_kohort/hapus'] = 'user_data_kohort/hapus';
/*End Data Register Ibu Hamil*/

/*Login*/
$route['pasien'] = 'pasien';
$route['pasien/cek_login'] = 'pasien/cek_login';
$route['pasien/logout'] = 'pasien/logout';
/*End Login*/


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;