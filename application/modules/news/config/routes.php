<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['news/(:num)'] = "news/select_news/$1";
$route['news/(:num)/(:num)'] = "news/index/$1/$2";
