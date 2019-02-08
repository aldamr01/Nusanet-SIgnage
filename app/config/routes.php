<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']                                =   'Signage';
$route['404_override']                                      =   'Signage';
$route['translate_uri_dashes']                              =   FALSE;

//VIEW
$route['site/list']                                         =   'SiteView/siteList';
$route['site/create']                                       =   'SiteView/siteCreate';
$route['site/change/(:num)']                                =   'SiteView/siteUpdate/$1';
$route['site/drop/(:num)']                                  =   'SiteData/siteDelete/$1';
$route['site/show/(:num)']                                  =   'SiteView/siteView/$1';

$route['user/list']                                         =   'UserView/userList';
$route['user/change/(:num)']                                =   'UserView/userUpdate/$1';
$route['user/create']                                       =   'UserView/userCreate';

//API
$route['API/UserLogin']                                     =   'Auth/checkUser';

$route['API/UserNew']                                       =   'UserData/userCreate';
$route['API/UserEdit']                                      =   'UserData/userUpdate';
$route['API/UserDrop/(:num)/(:num)']                        =   'UserData/userDelete/$1/$2';

$route['API/SiteList']                                      =   'SiteData/siteList';
$route['API/SiteNew']                                       =   'SiteData/siteCreate';
$route['API/SiteEdit']                                      =   'SiteData/siteUpdate';
$route['API/SiteView/(:num)']                               =   'SiteData/siteView/$1';

$route['API/ScreenNew']                                     =   'ScreenData/screenCreate';


//AUTH
$route['Authentication']                                    =   'Auth/login';
$route['Logoff']                                            =   'Auth/logout';

 