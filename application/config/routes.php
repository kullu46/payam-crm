<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'indexController/login';
$route['logout'] = 'indexController/logout';
$route['dashboard'] = 'indexController/dashboard';
$route['index'] = 'indexController/dashboard';
$route['phpinfo'] = 'indexController/displayPHPinfo';
$route['jobs/(:any)'] = 'jobsController/index/$1';
$route['jobs/create/(:any)/(:any)'] = 'jobsController/create/$1/$2';
$route['jobs/view/(:any)/(:any)'] = 'jobsController/view/$1/$2';
$route['jobs/edit/(:any)/(:any)'] = 'jobsController/edit/$1/$2';
$route['jobs/remove/(:any)/(:any)'] = 'jobsController/remove/$1/$2';

$route['ajax/getAutocompleteCustomers'] = 'ajaxController/getAutocompleteCustomers';
$route['ajax/getCustomer'] = 'ajaxController/getCustomer';

