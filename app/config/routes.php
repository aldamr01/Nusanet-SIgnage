    <?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']                                =   'Signage';
$route['404_override']                                      =   'Signage/er404';
$route['translate_uri_dashes']                              =   FALSE;

//SCREEN URL
$route['screen/(:num)/(:num)/(:any)/(:any)']                =   'Signage/screenView/$1/$2/$3/$4';
$route['screen2/(:num)/(:num)/(:any)/(:any)']                =   'Signage/screenView/$1/$2/$3/$4';
$route['screen/controller/(:num)/(:num)/(:any)']            =   'ScreenData/screenController/$1/$2/$3';

//VIEW
$route['site/list']                                         =   'SiteView/siteList';
$route['site/create']                                       =   'SiteView/siteCreate';
$route['site/change/(:num)']                                =   'SiteView/siteUpdate/$1';
//$route['site/drop/(:num)']                                  =   'SiteData/siteDelete/$1';
$route['site/show/(:num)']                                  =   'SiteView/siteView/$1';

$route['font/list']                                         =   'FontView/fontList';
$route['font/create']                                       =   'FontView/fontCreate';
$route['font/change/(:num)']                                =   'FontView/fontUpdate/$1';
$route['font/drop/(:num)']                                  =   'FontData/fontDelete/$1';

$route['user/list']                                         =   'UserView/userList';
$route['user/change/(:num)']                                =   'UserView/userUpdate/$1';
$route['user/create']                                       =   'UserView/userCreate';

$route['screen/MyScreen/(:num)/(:any)']                     =   'ScreenView/screenFind/$1/$2';
$route['template/MyTemplate']                               =   'TemplateView/templateFind';

//API
$route['API/UserLogin']                                     =   'Auth/checkUser';

$route['API/UserNew']                                       =   'UserData/userCreate';
$route['API/UserEdit']                                      =   'UserData/userUpdate';
$route['API/UserDrop/(:num)/(:num)']                        =   'UserData/userDelete/$1/$2';

$route['API/SiteList']                                      =   'SiteData/siteList';
$route['API/SiteNew']                                       =   'SiteData/siteCreate';
$route['API/SiteEdit']                                      =   'SiteData/siteUpdate';
$route['API/SiteView/(:num)']                               =   'SiteData/siteView/$1';

$route['API/FontList']                                      =   'FontData/fontList';
$route['API/FontNew']                                       =   'FontData/fontCreate';
$route['API/FontEdit']                                      =   'FontData/fontUpdate';

$route['API/ScreenNew']                                     =   'ScreenData/screenCreate';
$route['API/ScreenEdit']                                    =   'ScreenData/screenUpdate';
$route['API/ScreenDrop/(:num)/(:num)']                      =   'ScreenData/screenDelete/$1/$2';

$route['API/ContentNew']                                    =   'ContentData/contentCreate';
$route['API/ContentDrop/(:num)/(:num)']                     =   'ContentData/contentDelete/$1/$2';
$route['API/ContentChange']                                 =   'ContentData/contentUpdate';

$route['API/MarqueeNew']                                    =   'MarqueeData/marqueeCreate';
$route['API/MarqueeDrop/(:num)/(:num)']                     =   'MarqueeData/marqueeDelete/$1/$2';
$route['API/MarqueeChange']                                 =   'MarqueeData/marqueeUpdate';

$route['API/TemplateEdit']                                  =   'TemplateData/templateUpdate';
$route['API/TemplateNew']                                   =   'TemplateData/templateCreate';
$route['API/TemplateDrop/(:num)/(:num)']                    =   'TemplateData/templateDelete/$1/$2';

$route['API/ScheduleNew']                                   =   'ScheduleData/scheduleCreate';
$route['API/ScheduleDrop/(:num)/(:num)']                    =   'ScheduleData/scheduleDelete/$1/$2';
$route['API/ScheduleChange']                                =   'ScheduleData/scheduleUpdate';


//AUTH
$route['Authentication']                                    =   'Auth/login';
$route['Logoff']                                            =   'Auth/logout';

 