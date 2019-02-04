<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']                                    =   'Home';
$route['404_override']                                          =   '';
$route['translate_uri_dashes']                                  =   FALSE;
$route['(:any)']                                                =   'Err/on';

//portal akun login,regis,lupas
$route['portal/registrasi']                                     =   'Registrasi/index';
$route['portal/registrasi/proses']                              =   'Registrasi/ndaftar';

$route['portal/login']                                          =   'Authentication';
$route['portal/logout']                                         =   'Authentication/logout';

$route['portal/lupa_password']                                  =   'Lupa_password';
$route['portal/lupa_password/proses']                           =   'Lupa_password/recover';

//pengurus
$route['pengurus/homepage']                                     =   'Pengurus/dashboard';
$route['pengurus/profilku']                                     =   'Pengurus/profil_saya';


//mentoring    
$route['pengurus/mentoring']                                    =   'Mentoring/index';

//jadwal
$route['pengurus/mentoring/jadwal']                             =   'Mentoring/jadwal';
$route['pengurus/mentoring/jadwal/(:any)/(:any)']               =   'Crud/jadwal/$1/$2';
//$route['pengurus/mentoring']                                  =   '';

//common

//myprofile
$route['pengurus/profil']                                       =   'Pengurus/profile';
$route['pengurus/profil/(:any)']                                =   'Pengurus/view/$1/$2';
$route['pengurus/mentoring/kelas/(:any)/(:any)']                =   'Pengurus/view/$1/$2';


//Aplikasi
$route['pengurus/aplikasi']                                     =   'Aplikasi/index';
$route['pengurus/aplikasi/kta']                                 =   'Aplikasi/kta';
$route['pengurus/aplikasi/kta/cetak/(:any)']                    =   'Aplikasi/cetak_kta/$1';

//REST API
$route['aplikasi/api/anggota/(:any)']                           =   'Aplikasi/dataglobal/$1';

